<?php

namespace App\Models;

use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use FileHelper;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'status'
    ];
}
