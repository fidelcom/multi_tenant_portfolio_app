<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class VendorManagementController extends Controller
{
    public function index()
    {
        $users =  User::where('role', 'vendor')->orderBy('id', 'DESC')->get();
        return view('admin.manage_vendor.all_vendor', compact('users'));
    }

    public function create()
    {
        return view('admin.manage_vendor.create');
    }

    public function store(Request $request)
    {
        //        dd($request->all());
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'active',
            'is_suspended' => 0,
        ]);

        event(new Registered($user));
        Vendor::create([
            'user_id' => $user->id,
            'organization' => $request->organization,
            'organization_address' => $request->organization_address,
            'organization_email' => $request->organization_email,
            'organization_phone' => $request->organization_phone,
        ]);

        return redirect()->route('admin.all.vendor')->with([
            'message' => 'Vendor Created successfully!!',
            'alert-type' => 'success'
        ]);
    }

    public function show(User $user)
    {
        return view('admin.manage_vendor.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.manage_vendor.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
//                dd($request->role);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//        dd($user);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'active',
            'is_suspended' => 0,
        ]);

        return redirect()->route('admin.all.vendor')->with([
            'message' => 'Vendor updated successfully!!',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.all.vendor')->with([
            'message' => 'Vendor delete successfully!!',
            'alert-type' => 'success'
        ]);
    }
}
