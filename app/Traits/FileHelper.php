<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait FileHelper
{
    /**
     * @param UploadedFile $file
     * @param null $model
     * @return string
     */
    public function saveFileAndGetName(UploadedFile $file, $model = null)
    {
        $file = $file->store($this->getFolderName($model));
        return $file;
    }

    public function saveTempFileAndGetName(UploadedFile $file)
    {
        return $file->store("Temp");

    }

    public function moveFileFromTempAndGetName($file, $model)
    {
        $to = $this->getFolderName($model) . '/' . explode('Temp/', $file)[1];
        Storage::move($file, $to);
        return $to;
    }

    public function updateFileAndGetName(UploadedFile $file, $lastFile, $model = null)
    {
        return $this->deleteFile($lastFile)
            ->saveFileAndGetName($file, $model);
    }

    public function deleteFile($file)
    {
        if ($file && $file !== "" && Storage::exists($file))
            Storage::delete($file);
        return $this;
    }

    protected function getFolderName($model = null): Stringable
    {
        $class = $model ?: get_class();

        return Str::of($class)->afterLast('\\')->before('Controller')->kebab()
            ->slug('_')->plural();
    }

    public function getImagePath($key, $size = 'lg_')
    {
        $file = $this->$key;
        if (is_null($file) || $file === "" || !Storage::exists($file))
            return $this->getNoImagePath();
        return asset('storage/' . $file);
    }

    protected function getNoImagePath(): string
    {
        return 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png';
    }

    public function getImageByName($name)
    {
        if (!Storage::exists(storage_path($name)))
            return 'storage/' . $name;
    }
}
