@extends('Layout.default')


@section('contents')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>管理员密码修改</h5>

            </div>
            @include('Layout._errors')
            <div class="panel-body">
                <form method="post"  action="{{ route('admin.pwd_update',[$admin])}}">
                  {{--  <div class="form-group">
                        <label for="name">用户名：</label>
                        <input type="text" name="name" class="form-control" value="{{ $admin->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="email" name="email" class="form-control" value="{{ $admin->email}}">
                    </div>
--}}
                    <div class="form-group">
                        <label for="old_password">旧密码：</label>
                        <input type="password" name="old_password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="password">新密码：</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="re_password"> 确认密码：</label>
                        <input type="password" name="re_password" class="form-control">
                    </div>
                    {{--<label for="re_password">验证码</label>
                    <input id="captcha" class="form-control" name="captcha" >
                    <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">--}}

                    {{csrf_field()}}
                    {{ method_field('PUT')}}
                    <button type="submit" class="btn btn-primary" style="height:50px; width:100%">确认修改</button>
                </form>
            </div>
        </div>
    </div>
@stop

