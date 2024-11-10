<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\MainCategoryRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public  function  index(){
        $tags = Tag::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.tags.index',compact('tags'));
    }
    public  function  create(){
        return view('dashboard.tags.create');
    }
    public  function  store(TagsRequest $request){
        try {
            DB::beginTransaction();
            //validation

            //insert DB


//            $tag =Tag::create($request->only('slug'));
            $tag =Tag::create(['slug'=>$request->slug]);


            // save translation
            $tag ->name =$request->name;
            $tag ->save();
            DB::commit();
            return redirect()->route('admin.tags')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public  function  edit($id){
        //get specific categories and its translations
        $tag = Tag::find($id);

        if (!$tag)
            return redirect()->route('admin.tags')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.tags.edit', compact('tag'));
    }

    public  function  update($id ,TagsRequest $request){
        try {
            //validation

            //update DB
            $tag =  Tag::find($id);
            if (!$tag){
                return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود ']);
            }
            DB::beginTransaction();
            $tag ->update($request -> except('_token','id'));

            // save translation
            $tag ->name =$request->name;
            $tag ->save();
            DB::commit();
            return redirect()->route('admin.tags')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){

            DB::rollBack();
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public  function  destroy($id){
        try {
            //validation

            //update DB


            $tag =  Tag::find($id);

            if (!$tag){
                return redirect()->route('admin.tags')->with(['error' => 'هذا القسم غير موجود ']);
            }
            $tag->deleteTranslations(); // to delete translation
            $tag ->delete();

            return redirect()->route('admin.tags')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
