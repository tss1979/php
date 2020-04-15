<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->get();

        return view('admin.category', ['categories' => $categories]);
    }


    protected function change(Request $request, Category $category)
    {
        $data = $this->validate($request, Category::rules(),[], Category::attributeNames());

        $category->fill($data);

        $url = null;

        if($request->file('image'))
        {
            $path = Storage::putFile('public/images', $request->file('image'));
            $url = Storage::url($path);
            $category->category_image = $url;
        }
        
        $result = $category->save();

        if($result)
        {
            return redirect()->route('admin.category.index');
        } else {
            $request ->flash();
            return redirect()->route('admin.category_create');
        }


    }

    public function edit(Request $request, Category $category) {
        return view('admin.category_create', [
            'category' => $category
        ]);
    }

    public function create(Request $request)
    {
        $category = new Category();
        return view('admin.category_create', ['category'=> $category]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

}
