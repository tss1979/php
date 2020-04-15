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
            ->paginate(3);

        return view('admin.index', ['newsAll' => $news]);
    }

    
    protected function create(Request $request)
    {
        $news = new News();

        if($request->isMethod('post'))
        {
            $url = null;

            $data = $this->validate($request, News::rules(),[], News::attributeNames());
            
            $news->fill($data);


            if($request->file('image')){
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }

            $result = $news->save();

            if($result)
            {
                return redirect()->route('admin.index');
            } else {
                $request ->flash();
                return redirect()->route('admin.create');
            }

        }

        return view('admin.create', [
            'categories' => Category::query()->select(['id', 'name'])->get(),
            'news' => $news
        ]);
    }

    public function edit(Request $request, News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
        if ($request->isMethod('post')) {

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.index');
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index');
    }

}
