<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\FileHelper;
use Illuminate\Http\Request;
use Exception;

class AdminController extends Controller
{
    use FileHelper;

    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.list', compact('admins'));
    }

    public function create()
    {
        return view('admin.admin.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'contact' => 'required|digits:11',
            'designation' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $adminData = $request->all();

        $adminData['password'] = bcrypt($adminData['password']);

        Admin::create($adminData);
        (new Admin($adminData));
        return response('', 201);
    }

    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'contact' => 'required|digits:11',
            'designation' => 'required'
        ]);

        $adminData = $request->all();
        if (is_null($request->get('password'))) {
            unset($adminData['password']);
        } else {
            $request->validate([
                'password' => 'min:6',
                'confirm_password' => 'required_with:password|same:password|min:6'
            ]);
            $adminData['password'] = bcrypt($adminData['password']);
        }

        $admin->update($adminData);
        return response('', 204);
    }

    public function nameCheck(Request $request)
    {
        $admin = Admin::where('name', $request->name)->first();
        if ($admin)
            return response()->json(['name' => 'Exists'], 200);
    }
}
