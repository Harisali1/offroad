<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
