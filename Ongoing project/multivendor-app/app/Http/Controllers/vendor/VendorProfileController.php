<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class VendorProfileController extends Controller
{
    public function index()
    {
        $vendor = User::find(Auth::id());
        return view('vendor.profile.index', compact('vendor'));
    }

    public function update(User $user, Request $request)
    {
//        dd($request->all());
        $request->validate([
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        if ($request->hasFile('photo'))
        {
            $img = $request->file('photo');
            $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/profile/'.$filename);
            $filename = 'uploads/profile/'.$filename;
            if ($user->image)
            {
                unlink($user->image);
            }
            $user->update([
                'photo' => $filename,
            ]);
        }

        $user->update([
            "username" => $request->username,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        return redirect()->back()->with([
            'message' => 'Profile updated successfully!!!',
            'alert-type' => 'success'
        ]);
    }

    public function storeVendorDetails(Request $request)
    {
        $vendor = Vendor::where('user_id', Auth::id())->first();
        if ($vendor)
        {
            $vendor->update([
                'organization' => $request->organization,
                'organization_address' => $request->organization_address,
                'organization_email' => $request->organization_email,
                'organization_phone' => $request->organization_phone,
            ]);

            return redirect()->back()->with([
                'message' => 'Vendor organization updated successfully!!!',
                'alert-type' => 'success'
            ]);

        } else {
            $vendor = Vendor::create([
                'user_id' => Auth::id(),
                'organization' => $request->organization,
                'organization_address' => $request->organization_address,
                'organization_email' => $request->organization_email,
                'organization_phone' => $request->organization_phone,
            ]);

            return redirect()->back()->with([
                'message' => 'Vendor organization added successfully!!!',
                'alert-type' => 'success'
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->getAuthPassword()))
        {
            return back()->with('error', 'Old password doesn\'t match');
        }

        //Update new password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with([
            'status' => 'Password updated successfully!',
            'message' => 'Vendor organization added successfully!!!',
            'alert-type' => 'success'
        ]);
    }
}
