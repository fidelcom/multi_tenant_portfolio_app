<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    public function index()
    {
        $users =  User::orderBy('id', 'DESC')->get();
        return view('admin.manage_user.all_user', compact('users'));
    }

    public function create()
    {
        return view('admin.manage_user.create');
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
            'role' => $request->role,
            'status' => 'active',
            'is_suspended' => 0,
        ]);

        event(new Registered($user));

        return redirect()->route('admin.all.user')->with([
            'message' => 'User Created successfully!!',
            'alert-type' => 'success'
        ]);
    }

    public function show(User $user)
    {
        return view('admin.manage_user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.manage_user.edit', compact('user'));
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

        return redirect()->route('admin.all.user')->with([
            'message' => 'User updated successfully!!',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.all.user')->with([
            'message' => 'User delete successfully!!',
            'alert-type' => 'success'
        ]);
    }
}
