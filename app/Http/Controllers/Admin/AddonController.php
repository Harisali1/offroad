<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use Exception;
use App\Traits\FileHelper;
use Illuminate\Http\Request;

class AddonController extends Controller
{
    use FileHelper;
    public function index()
    {
       $addons = Addon::all();
        return view('admin.addon.list',compact('addons'));
    }

    public function create()
    {
        return view('admin.addon.add');
    }

    public function store(Request $request)
    {
        $addonData = $request->all();

        $title = $addonData['title'];

        $model = Addon::class;
        $addonData['image'] = $this->moveFileFromTempAndGetName($addonData['image'], $model);
        Addon::create($addonData);

        (new Addon($addonData));
        return redirect()->route('admin.addon.index')->with('success_message', 'Addon Created Successfully');
    }

    public function edit(Addon $addon)
    {
        return view('admin.addon.edit',compact('addon'));
    }

    public function update(Request $request, Addon $addon)
    {
        $addonData = $request->all();

        $model = Addon::class;

        if ($addonData['image'] !== $addon->image) {
            $this->deleteFile($addon->image);
            $addonData['image'] = $this->moveFileFromTempAndGetName($addonData['image'], $model);
        }

        $addon->update($addonData);
        return response('', 204);
    }
    public function destroy(Addon $addon)
    {
        try {
            $this->deleteFile($addon->image);
            $addon->delete();
            return redirect()->back()->with('success_message', 'Addon Deleted Successfully');
        } catch (Exception $exception) {
            return abort(404);
        }
    }
}
