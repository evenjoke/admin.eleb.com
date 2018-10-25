@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <form method="post" style="width:80%" enctype="multipart/form-data"  action="{{ route('shop_category.store') }}" enctype="multipart/form-data">
        <div class="form-group" >
            <h1>添加分类</h1>
            <label>分类名</label>
                <input type="text" name="name" class="form-control" placeholder="3—10长度">
            <label>分类图片</label>
                <input type="file" name="img" class="form-control" >
            <label>状态</label>
            <div>
                <label>
                    <input type="radio" name="status" value="1"
                           @if(old('status'))
                           selected="selected"
                            @endif>显示
                </label>
                <label>
                    <input type="radio" name="status" value="0"
                           @if(old('status'))
                           selected="selected"
                            @endif>隐藏
                </label>
            </div>
        {{ csrf_field() }}
            </div>
        <button type="submit" style="float:left" class="btn btn-primary">立即提交</button>
    </form>

@stop