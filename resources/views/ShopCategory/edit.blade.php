@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <form method="post" style="width:80%" enctype="multipart/form-data"  action="{{ route('shop_category.update',[$shopCategory]) }}" >
        <div class="form-group" >
            <h1>修改分类</h1>
            <label>分类名</label>
                <input type="text" name="name" class="form-control"  value="{{ $shopCategory->name}}">
            <label>分类图片</label>
             <img class="img-circle" src="{{ Illuminate\Support\Facades\Storage::url($shopCategory->img)}}"/>
                <input type="file" name="img" class="form-control" >
            <label>状态</label>
            <input type="radio" name="status" value="1"
                   @if($shopCategory->status==1)
                    checked="checked"
                    @endif>显示
            <input type="radio" name="status" value="0"
                   @if($shopCategory->status==0)
                   checked="checked"
                    @endif>隐藏
        </div>
        {{ csrf_field() }}
        {{ method_field('PUT')}}

        <button type="submit" style="float:left" class="btn btn-primary">立即提交</button>
    </form>

@stop