
@extends('Layout.default')
@section('contents')
    @include('vendor.ueditor.assets')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>管理员注册</h5>

            </div>
            @include('Layout._errors')
            <div class="panel-body">
                <form method="POST"  action="{{ route('admin.store') }}">
                    <div class="form-group">
                        <label for="name">用户名：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <!-- 实例化编辑器 -->

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="re_password"> 确认密码：</label>
                        <input type="password" name="re_password" class="form-control" value="{{ old('re_password') }}">
                    </div>
                    <label for="re_password">验证码</label>
                    <input id="captcha" class="form-control" name="captcha" >
                    <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                     {{csrf_field()}}
                     <div  class="checkbox">
                         <label>
                        <input type="checkbox" name="remember_me"  value="1" @if(old('remember_me')) checked="checked" @endif />
                        记住我</label>
                     </div>
                    <button type="submit" class="btn btn-primary" style="height:50px; width:100%">注册</button>
                </form>
            </div>
        </div>
    </div>
@stop

