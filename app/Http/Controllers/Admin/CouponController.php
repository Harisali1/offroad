<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends controller
{
    public function index()
    {
        return view('admin.coupon.list');
    }

    public function create()
    {
        return view('admin.coupon.add');
    }

    public function store(Request $request)
    {
        Coupon::create($request->all());
        return response('', 201);
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update($request->all());
        return response('', 204);
    }

}
