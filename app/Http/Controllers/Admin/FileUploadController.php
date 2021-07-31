<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Traits\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FileUploadController extends controller
{
    use FileHelper;
    public function storeGallery(Request $request)
    {
        $file = $request->file('test');
        $file = $this->saveTempFileAndGetName($file);
        return $file;
    }

    public function removeGallery()
    {
        $this->deleteFile(request()->get('file'));
    }

    public function fetchGallery(Request $request)
    {
        if ($request->has('load')) {
            $file = $this->getImageByName($request->get('load'));
            if (!$file) {
                $file = $this->getImageByName($request->get('load'));
            }

            $fp = fopen($file, 'rb');

            header('Content-Type: image/' . Str::afterLast($request->get('load'), '.'));
            header('Content-Length: ' . File::size($file));

            return fpassthru($fp);
        }
        return false;
    }
}
