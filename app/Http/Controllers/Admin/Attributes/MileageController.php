<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Mileage;
use Illuminate\Http\Request;

class MileageController extends Controller
{
    public function index()
    {
        return view('admin.attributes.mileage.list');
    }

    public function create()
    {
        return view('admin.attributes.mileage.add');
    }

    public function store(Request $request)
    {
        Mileage::create($request->all());
        return response('', 201);
    }

    public function edit(Mileage $mileage)
    {
        return view('admin.attributes.mileage.edit', compact('mileage'));
    }

    public function update(Request $request, Mileage $mileage)
    {
        $mileage->update($request->all());
        return response('', 204);
    }
}
