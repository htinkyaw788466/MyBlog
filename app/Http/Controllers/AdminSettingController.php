<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function Profile()
    {
        return view('admin.setting.profile');
    }

    public function profileUpdate(Request $request)
    {
        // Get Form Image
        $image = $request->file('image');
        $user=User::find(Auth::user()->id);
        if (isset($image)) {

            // Make Unique Name for Image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Check userImg Dir is exists
            if (!Storage::disk('public')->exists('userImg')) {
                Storage::disk('public')->makeDirectory('userImg');
            }

            // Delete Old Image
            if (Storage::disk('public')->exists('userImg/' . $user->image)) {
                Storage::disk('public')->delete('userImg/' . $user->image);
            }

            // Resize Image for user and upload
            $user = Image::make($image)->resize(40,30)->stream();
            Storage::disk('public')->put('userImg/' . $imagename, $user);

        } else {
            $imagename = $user->image;
        }

       $user=User::find(Auth::user()->id);
       $user->name=$request->name;
       $user->slug=$request->slug;
       $user->email=$request->email;
       $user->content=$request->content;
       $user->image=$imagename;
       $user->save();
       $notification = array(
           'message' => 'Profile Updated Successfully',
           'alert-type' => 'info'
       );
       return redirect()->route('dashboard')
              ->with($notification);
    }

    public function Password()
    {
        return view('admin.setting.password-update');
    }

    public function passwordUpdate(Request $request)
    {
        $validateData=$this->validate($request,[
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
        ]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back()->with('error','current password is invalid');
        }
    }
}
