<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartAssistant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status'
    ];
    protected $with=['relations'];

    public function relations()
    {
        return $this->hasMany(SmartAssistantRelation::class);
    }
}
