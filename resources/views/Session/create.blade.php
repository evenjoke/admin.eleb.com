@extends('Layout.default')

@section('contents')
    @include('Layout._errors')
    <h1>管理员登录</h1>
    <form method="post" action="{{ route('store') }}">
        <div class="form-group">
            <label>账号</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember_me" value="1" @if(old('remember_me')) checked="checked" @endif> 记住我
            </label>
        </div>


        {{ csrf_field() }}
        <button class="btn btn-primary btn-block">登录</button>
    </form>
    <div>
        <a href="{{route('admin.create')}}" class="btn btn-info btn-block">注册</a>
    </div>
    <div class="checkbox">
        <label>
            <a href="#" >忘记密码？</a>
        </label>
    </div>

@stop