<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserStatusManagementController extends Controller
{
    public function suspendUser(User $user) : RedirectResponse
    {
        $user->update([
            'status' => 'deactivated',
            'is_suspended' => 1
        ]);
        return redirect()->back()->with([
            'message' => 'User suspended successfully!!',
            'alert-type' => 'success'
        ]);
    }

    public function activateUser(User $user) : RedirectResponse
    {
//        dd($user);
        $user->update([
            'status' => 'active',
            'is_suspended' => 0
        ]);
        return redirect()->back()->with([
            'message' => 'User activated successfully!!',
            'alert-type' => 'success'
        ]);
    }
}
