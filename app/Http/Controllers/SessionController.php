<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['login','store']
        ]);
    }


    public function login()
    {
        return view('Session.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ],
            [
                'name.required'=>'账号不能为空',
                'password.required'=>'密码不能为空'
            ]);
        //验证 账号密码是否正确
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            //认证通过 登录成功 提示登录成功 跳转到上一次访问的页面
            return redirect()->intended(route('admin.index'))->with('success','登录成功');

            //return redirect()->route('user.index')->with('success','登录成功');
        }else{
            //登录失败
            return back()->with('danger','用户名或密码错误，请重新登录')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success','您已成功退出登录');
    }
}
