<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['create','store']
        ]);
    }
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
            'password'=>bcrypt($request->password),
            'remember_token'=> str_random(50),
        ]);

        session()->flash('success','注册成功请登录');
        return redirect()->route('login');
    }
    public function create()
    {
        return view('Admin.add');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success','删除成功');

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

        ],
            [
                'name.required'=>'管理员名称不能为空',
                'email.email'=>'邮件格式不对',
                'email.required'=>'邮件不能为空',
            ]);

        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        session()->flash('success','修改成功');
        return redirect()->route('admin.index');

    }
    public function show()
    {

    }

    public function pwd_edit(Admin $admin)
    {
        return view('Admin.update',compact('admin'));
    }
    public function pwd_update(Admin $admin,Request $request)
    {
            //$password=$request->old_password;
           if(Hash::check($request->old_password,Auth::user()->password)) {
               $this->validate($request, [
                   'old_password' => 'required',
                   'password' => 'required|min:6',
                   're_password' => 'required|same:password',
               ],
                   [
                       'old_password.required' => '密码不能为空',
                       'password.required' => '新密码不能为空',
                       'password.min' => '新密码必须大于6位数',
                       're_password.required' => '请确认密码',
                       're_password.same' => '两次密码不一致',
                   ]);
           }else{
               return "密码不正确";
           }
        $admin->update([
            'password'=>bcrypt($request->password),
        ]);
        session()->flash('success','密码修改成功');
        return redirect()->route('admin.index');
    }


}
