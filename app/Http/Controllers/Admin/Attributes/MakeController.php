<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Make;
use App\Traits\FileHelper;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    use FileHelper;

    public function index()
    {
        return view('admin.attributes.make.list');
    }

    public function create()
    {
        return view('admin.attributes.make.add');
    }

    public function store(Request $request)
    {
        $makeData = $request->all();
        $makeData['image'] = $this->moveFileFromTempAndGetName($makeData['image'], Make::class);
        Make::create($makeData);
        return response('', 201);
    }

    public function edit(Make $make)
    {
        return view('admin.attributes.make.edit', compact('make'));
    }

    public function update(Request $request, Make $make)
    {
        $makeData = $request->all();
        if ($makeData['image'] !== $make->image) {
            $this->deleteFile($make->image);
            $makeData['image'] = $this->moveFileFromTempAndGetName($makeData['image'], Make::class);
        }
        $make->update($makeData);
        return response('', 204);
    }
}
