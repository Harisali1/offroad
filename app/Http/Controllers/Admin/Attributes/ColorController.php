<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('admin.attributes.color.list');
    }

    public function create()
    {
        return view('admin.attributes.color.add');
    }

    public function store(Request $request)
    {
        Color::create($request->all());
        return response('', 201);
    }

    public function edit(Color $color)
    {
        return view('admin.attributes.color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $color->update($request->all());
        return response('', 204);
    }
}
