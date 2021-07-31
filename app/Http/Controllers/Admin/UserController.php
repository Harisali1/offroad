<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $customers = User::all();
        return view('admin.customer.list', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins',
            'contact' => 'required|digits:11',
            'address' => 'required',
            'address_at' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $customerData = $request->all();
        $customerData['password'] = bcrypt($customerData['password']);

        User::create($customerData);
        (new User($customerData));
        return response('', 201);
    }

    public function show(User $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }

    public function edit(User $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, User $customer)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required|digits:11',
            'address' => 'required',
            'address_at' => 'required',
            'email' => 'required|email|unique:users,email,' . $customer->id,
        ]);

        $customerData = $request->all();
        if ($request->get('password') == null) {
            unset($customerData['password']);
        } else {
            $request->validate([
                'password' => 'min:6',
                'confirm_password' => 'required_with:password|same:password|min:6'
            ]);
            $customerData['password'] = bcrypt($customerData['password']);
        }

        $customer->update($customerData);
        return response('', 204);
    }
}
