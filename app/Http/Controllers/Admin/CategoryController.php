<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\FileHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use FileHelper;

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $categoryData = $request->all();

        $title = $categoryData['title'];
        $slug = Str::slug($title, '-');
        $categoryData['slug'] = $slug;

        $model = Category::class;
        $categoryData['image'] = $this->moveFileFromTempAndGetName($categoryData['image'], $model);
        Category::create($categoryData);

        (new Category($categoryData));
        return response('', 201);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $categoryData = $request->all();
        if (is_null($request->get('slug'))) unset($categoryData['slug']);

        $model = Category::class;

        if ($categoryData['image'] !== $category->image) {
            $this->deleteFile($category->image);
            $categoryData['image'] = $this->moveFileFromTempAndGetName($categoryData['image'], $model);
        }

        $category->update($categoryData);
        return response('', 204);
    }
}
