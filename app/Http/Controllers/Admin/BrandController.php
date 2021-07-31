<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\FileHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use FileHelper;

    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.add');
    }

    public function store(Request $request)
    {
        $brandData = $request->all();

        $title = $brandData['title'];
        $slug = Str::slug($title, '-');
        $brandData['slug'] = $slug;

        $model = Brand::class;
        $brandData['image'] = $this->moveFileFromTempAndGetName($brandData['image'], $model);
        Brand::create($brandData);

        (new Brand($brandData));
        return response('', 201);
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $brandData = $request->all();
        if (is_null($request->get('slug'))) unset($brandData['slug']);

        $model = Brand::class;

        if ($brandData['image'] !== $brand->image) {
            $this->deleteFile($brand->image);
            $brandData['image'] = $this->moveFileFromTempAndGetName($brandData['image'], $model);
        }

        $brand->update($brandData);
        return response('', 204);
    }
}
