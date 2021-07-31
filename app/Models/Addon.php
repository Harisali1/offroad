<?php

namespace App\Models;

use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use FileHelper;

    protected $fillable = [
        'title',
        'image',
        'status'
    ];
}
