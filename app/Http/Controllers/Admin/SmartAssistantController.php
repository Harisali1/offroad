<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\QueryExceptionueryException as QueryExceptionueryExceptionAlias;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Make;
use App\Models\Mileage;
use App\Models\Models;
use App\Models\SmartAssistant;
use App\Models\SmartAssistantRelation;
use App\Models\Year;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SmartAssistantController extends controller
{
    public function index()
    {
        return view('admin.smart_assistant.list');
    }

    public function create()
    {
        return view('admin.smart_assistant.add')
            ->with([
                'makes' => Make::all(['id', 'title as text']),
                'years' => Year::all(['id', 'title as text']),
                'mileages' => $this->getMileages(),
            ]);
    }

    public function store(Request $request)
    {
        try {
            SmartAssistant::firstOrCreate([
                'title' => $request['title']
            ])->relations()->createMany($request['relations']);
            return response('', 201);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return response()->json([
                    'errors' => [
                        'Duplicate' => ['Duplicate entry not allow']
                    ],
                    'message' => 'The given data was invalid.'
                ], 422);
            }
        }

    }

    public function edit(SmartAssistant $smart_assistant)
    {
        return view('admin.smart_assistant.edit')
            ->with([
                'makes' => Make::all(['id', 'title as text']),
                'years' => Year::all(['id', 'title as text']),
                'mileages' => $this->getMileages(),
                'smart_assistant' => $smart_assistant
            ]);
    }

    public function update(Request $request, SmartAssistant $smart_assistant)
    {
        $smart_assistant->update(['title' => $request['title']]);
        $smart_assistant->relations()->delete();
        $smart_assistant->relations()->createMany($request['relations']);
        return response('', 204);
    }

    public function models()
    {
        return response()->json(['models' => Models::where('make_id', request()->id)->get(['id', 'title as text'])]);
    }

    protected function getMileages()
    {
        $mileages = Mileage::all();
        return $mileages->map(function ($item) {
            return [
                'id' => $item['id'],
                'text' => $item['from'] . ' to ' . $item['to']
            ];
        });
    }

}
