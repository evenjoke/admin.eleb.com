@extends('Layout.default')
@section('contents')
<table class="table table-bordered table-striped" >
    <tr>
        <th>ID</th>
        <th>用户名</th>
        <th>用户邮箱</th>
        <th>用户创建时间</th>
        <th>用户最后修改</th>
        <th>用户操作</th>
    </tr>
    @foreach ($admins as $admin)

        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->created_at}}</td>
            <td>{{$admin->updated_at}}</td>
            <td>
                <span class="label label-warning"><a href="{{route('admin.edit',[$admin->id])}}">修改</a></span>

                <form method="post" action="{{route('admin.destroy',[$admin->id])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="label label-danger">删除</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{$admins->links()}}
@endsection

