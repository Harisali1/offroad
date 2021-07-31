<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'models';

    use HasFactory;

    protected $fillable = [
        'make_id',
        'title',
        'type',
        'status'
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
