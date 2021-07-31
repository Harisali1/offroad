<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Make;
use App\Models\Mileage;
use App\Models\Models;
use App\Models\Year;

class AttributeController extends Controller
{
    public function index()
    {
        return view('admin.attributes.attribute-list')
            ->with([
                'makes' => Make::count(),
                'models' => Models::count(),
                'years' => Year::count(),
                'mileages' => Mileage::count(),
                'colors' => Color::count()
            ]);
    }
}
