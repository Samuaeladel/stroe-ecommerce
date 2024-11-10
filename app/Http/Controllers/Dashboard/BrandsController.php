<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public  function  index(){
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index',compact('brands'));
    }
    public  function  create(){
        return view('dashboard.brands.create');
    }
    public  function  store(BrandRequest $request){
        try {
            DB::beginTransaction();
            //validation

            //insert DB

            if (!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);


            $brand =Brand::create($request->except('_token','photo'));

            $fileName="";
            if ($request->has('photo')){
                $fileName = uploadImage('brands',$request->photo);
            }
            // save translation
            $brand ->name =$request->name;
            $brand->photo = $fileName;
            $brand ->save();
            DB::commit();
            return redirect()->route('admin.brands')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public  function  edit($id){
        //get specific categories and its translations
        $brand = Brand::orderBy('id', 'DESC')->find($id);

        if (!$brand)
            return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.brands.edit', compact('brand'));
    }

    public  function  update($id ,BrandRequest $request){
        try {
            //validation

            //update DB
            $brand =  Brand::find($id);
            if (!$brand){
                return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود ']);
            }
            DB::beginTransaction();
            if ($request->has('photo')){
                $fileName= uploadImage('brands',$request->photo);
                Brand::where('id',$id)->update([
                    'photo'=>$fileName,
                ]);
            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);


            $brand ->update($request -> except('_token','id','photo'));

            // save translation
            $brand ->name =$request->name;
            $brand ->save();
            DB::commit();
            return redirect()->route('admin.brands')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){

            DB::rollBack();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public  function  destroy($id){
        try {
            //validation

            //update DB


            $brand =  Brand::find($id);

            if (!$brand){
                return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود ']);
            }
            $brand ->delete();

            return redirect()->route('admin.brands')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
