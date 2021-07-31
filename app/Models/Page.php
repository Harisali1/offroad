<?php

namespace App\Models;
use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use FileHelper;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status'
    ];
}
