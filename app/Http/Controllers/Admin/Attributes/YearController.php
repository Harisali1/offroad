<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {
        return view('admin.attributes.year.list');
    }

    public function create()
    {
        return view('admin.attributes.year.add');
    }

    public function store(Request $request)
    {
        Year::create($request->all());
        return response('', 201);
    }

    public function edit(Year $year)
    {
        return view('admin.attributes.year.edit', compact('year'));
    }

    public function update(Request $request, Year $year)
    {
        $year->update($request->all());
        return response('', 204);
    }
}
