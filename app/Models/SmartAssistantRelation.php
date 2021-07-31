<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartAssistantRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'smart_assistant_id',
        'make_id',
        'models_id',
        'year_id',
        'mileage_id'
    ];

    protected $with = [
        'make',
        'models',
        'year',
        'mileage'
    ];

    public function assistant()
    {
        return $this->belongsTo(SmartAssistant::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function models()
    {
        return $this->belongsTo(Models::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function mileage()
    {
        return $this->belongsTo(Mileage::class);
    }
}
