<?php
/**
 * Created by PhpStorm.
 * User: sergeytashkinov
 * Date: 2020-04-10
 * Time: 23:33
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()
            ->orderByDesc('created_at')
            ->paginate(3);

        return view('admin.index', ['newsAll' => $news]);
    }

    public function create(News $news)
    {
        return view('admin.create', [
            'categories' => Category::query()->select(['id', 'name'])->get(),
            'news' => $news
        ]);
    }

    public function edit( News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $result = $this->saveData($request, $news);
        if($result)
        {
            return redirect()->route('admin.index');
        } else {
            $request ->flash();
            return redirect()->route('admin.create');
        }

    }

    public function store(Request $request)
    {
        $news = new News();

        $result = $this->saveData($request, $news);

        if($result)
        {
            return redirect()->route('admin.index');
        } else {
            $request ->flash();
            return redirect()->route('admin.create');
        }

    }

    protected function saveData(Request $request, News $news)
    {

            $url = null;

            $data = $this->validate($request, News::rules(),[], News::attributeNames());
            
            $news->fill($data);

            if($request->file('image')){
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }


            return $news->save();

    }


    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index');
    }

}
