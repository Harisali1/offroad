<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\FileHelper;
use Illuminate\Http\Request;
use Exception;

class PageController extends Controller
{
    use FileHelper;

    public function index()
    {
        $pages = Page::all();
        return view('admin.page.list', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.add');
    }

    public function store(Request $request)
    {
        $pageData = $request->all();
        $model = Page::class;
        $pageData['image'] = $this->moveFileFromTempAndGetName($pageData['image'], $model);
        Page::create($pageData);
        (new Page($pageData));
        return response('', 201);
    }


    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $pageData = $request->all();
        $model = Page::class;
        if ($pageData['image'] !== $page->image) {
            $this->deleteFile($page->image);
            $pageData['image'] = $this->moveFileFromTempAndGetName($pageData['image'], $model);
        }
        $page->update($pageData);
        return response('', 204);
    }

    public function destroy(Page $page)
    {
        try {
            $this->deleteFile($page->image);
            $page->delete();
            return redirect()->back()->with('success_message', 'Page Deleted Successfully');
        } catch (Exception $exception) {
            return abort(404);
        }
    }
}
