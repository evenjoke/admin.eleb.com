<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index(Admin $admin)
    {
        $admins = $admin->paginate(1);
        //dd($shopCategorys);
        return view('Admin.index',compact('admins'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',
            'captcha' => 'required|captcha',
        ],
            [
                'name.required'=>'管理员名称不能为空',
                'email.email'=>'邮件格式不对',
                'email.required'=>'邮件不能为空',
                'password.required'=>'密码不能为空',
                'password.min'=>'密码长度不能小于6位数',
                're_password.same'=>'两次密码必须一致',
                're_password.required'=>'密码不能为空',
                'captcha.captcha'=>'验证码错误',
                'captcha.required'=>'验证码不能为空',
            ]);
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('$request->password'),
            'remember_token'=> str_random(50),
        ]);

        session()->flash('success','成功');
        return redirect()->route('admin.index');
    }
    public function create()
    {
        return view('Admin.add');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success','分类删除成功');

        return redirect()->route('admin.index');

    }

    public function edit(Admin $admin)
    {

        return view('Admin.edit',compact('admin'));
    }

    public function update(Admin $admin,Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',

        ],
            [
                'name.required'=>'管理员名称不能为空',
                'email.email'=>'邮件格式不对',
                'email.required'=>'邮件不能为空',
                'password.required'=>'密码不能为空',
                'password.min'=>'密码长度不能小于6位数',
                're_password.same'=>'两次密码必须一致',

            ]);

        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('$request->password'),
        ]);

        session()->flash('success','修改成功');
        return redirect()->route('admin.index');

    }
    public function show()
    {

    }
}
