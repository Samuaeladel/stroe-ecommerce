<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShippingMethods($type){
        // free , inner , outer for shipping methods
        if ($type === 'free' )
            $shippingMethod = Setting::where('key','free_shipping_label')->first();
        elseif ($type === 'inner' )
            $shippingMethod = Setting::where('key','local_label')->first();
        else if ($type === 'outer' )
            $shippingMethod = Setting::where('key','outer_label')->first();
        else
            $shippingMethod = Setting::where('key','free_shipping_label')->first();
        return view('dashboard.settings.shippings.edit',compact('shippingMethod'));
    }
    public  function  updateShippingMethods(ShippingRequest $request,$id){
        try {
                $sipping_method = Setting::find($id);
                DB::beginTransaction();
                $sipping_method -> update(['plain_value'=>$request->plain_value]);
                //save translation
                $sipping_method -> value = $request ->value;
                $sipping_method ->save();
                DB::commit();
                return redirect()->back()->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->back()->with(['error'=>'هناك خطاء ما']);
            DB::rollBack();
        }
    }

}
