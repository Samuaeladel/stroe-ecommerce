<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public  function  editProfile(){
        $admin = Admin::find(auth('admin')->user()->id);
        return view('dashboard.profile.edit' , compact('admin'));
    }
    public  function updateProfile(ProfileRequest $request){
        try {
            $admin = Admin::find(auth('admin')->user()->id);

            if ($request->filled('password')){
                $request -> merge(['password'=> bcrypt($request->password)]);
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            $admin -> update($request->all());
            return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->back()->with(['error'=>'هناك خطاء ما']);
        }
    }
}
