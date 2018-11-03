@extends('Layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <tr>
            <th>商铺分类ID</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($shopCategorys as $shopCategory)
            <tr>
                <td>{{ $shopCategory->id }}</td>
                <td>{{ $shopCategory->name }}</td>
                <td>@if($shopCategory->img) <img class="img-circle img-center"  style="width:100px;height:80px" src="{{ Illuminate\Support\Facades\Storage::url($shopCategory->img)}}"/> @endif </td>
                <td>{{ $shopCategory->status==1 ? '显示' : '隐藏' }}</td>
                <td>
                    <a href="{{route('shop_category.create',[ $shopCategory->id] )}}" class="btn btn-primary">新增</a>
                    <a href="{{route('shop_category.edit',[ $shopCategory->id] )}}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{route('shop_category.destroy',[$shopCategory->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$shopCategorys->links()}}
@endsection