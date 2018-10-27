<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ShopCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }
    public function index()
    {
        $shopCategorys = DB::table('shop_categories')->where('status','=',1)->paginate(1);
        //dd($shopCategorys);
        return view('ShopCategory.index',compact('shopCategorys'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'name'=>'required',
            'img'=>'required|file:img',
            'status'=>'required',
        ],
            [
                'name.required'=>'分类名不能为空',
                'img.file'=>'图片格式不对',
                'img.required'=>'图片不能为空',
                'status.required'=>'状态不能为空',
            ]);

        $path = $request->file('img')->store('public/shop_category');
        ShopCategory::create([
            'name'=>$request->name,
            'img'=>$path,
            'status'=>$request->input('status'),
        ]);
        session()->flash('success','成功');
        return redirect()->route('shop_category.index');
    }
    public function create()
    {
        return view('ShopCategory.add');
    }
    public function destroy(ShopCategory $shopCategory)
    {
        $shopCategory->delete();
        session()->flash('success','分类删除成功');

        return redirect()->route('shop_category.index');

    }

    public function edit(ShopCategory $shopCategory)
    {

        return view('ShopCategory.edit',compact('shopCategory'));
    }

    public function update(ShopCategory $shopCategory,Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'img'=>'file:img',
            'status'=>'required',
        ],
            [
                'name.required'=>'分类名不能为空',
                'img.file'=>'图片格式不对',
                'status.required'=>'状态不能为空',
            ]);
        if ($request->img){
            $path=$path=$request->file('img')->store('public/shop_category');
        }
        else{
            $path=$shopCategory->img;
        }
       // dd($path);
        $shopCategory->update([
            'name'=>$request->name,
            'status'=>$request->input('status'),
            'img'=>$path,
        ]);

        session()->flash('success','修改成功');
        return redirect()->route('shop_category.index');

    }
    public function show()
    {

    }
}
