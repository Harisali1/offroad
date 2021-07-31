<?php

namespace App\Models;

use App\Traits\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use FileHelper, HasFactory;

    protected $fillable = [
        'title',
        'image',
        'status'
    ];
}
