<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCategoriesController extends Controller
{
    public  function  index(){
        $categories = Category::with('_parent')->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index',compact('categories'));
    }
    public  function  create(){
//        $categories =   Category::select('id','parent_id')->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('dashboard.categories.create',compact('categories'));
    }
    public  function  store(MainCategoryRequest $request){
        try {
            DB::beginTransaction();
            //validation

            //insert DB

            if (!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);
            if ($request->type == CategoryType::mainCategory){
                $request -> request->add(['parent_id'=>null]);
            }

            $category =Category::create($request->except('_token'));

            // save translation
            $category ->name =$request->name;
            $category ->save();
            DB::commit();
            return redirect()->route('admin.maincategories')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public  function  edit($id){
        //get specific categories and its translations
        $category = Category::orderBy('id', 'DESC')->find($id);

        if (!$category)
            return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.categories.edit', compact('category'));
    }

    public  function  update($id ,MainCategoryRequest $request){
        try {
            //validation

            //update DB
            $category =  Category::find($id);
            if (!$category){
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);
            }
            if (!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);


            $category ->update($request -> all());

            // save translation
            $category ->name =$request->name;
            $category ->save();
            return redirect()->route('admin.maincategories')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public  function  destroy($id){
        try {
            //validation

            //update DB


            $category =  Category::orderBy('id', 'DESC')->find($id);

            if (!$category){
                return redirect()->route('admin.maincategories')->with(['error' => 'هذا القسم غير موجود ']);
            }
            $category ->delete();

            return redirect()->route('admin.maincategories')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
