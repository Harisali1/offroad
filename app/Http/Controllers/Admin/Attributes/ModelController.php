<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Models\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        return view('admin.attributes.model.list');
    }

    public function create()
    {
        $makes = Make::all('id', 'title as text');
        return view('admin.attributes.model.add', compact('makes'));
    }

    public function store(Request $request)
    {
        Models::create($request->all());
        return response('', 201);
    }

    public function edit(Models $model)
    {
        $makes = Make::all('id', 'title as text');
        return view('admin.attributes.model.edit', compact('makes', 'model'));
    }

    public function update(Request $request, Models $model)
    {
        $model->update($request->all());
        return response('', 204);
    }
}
