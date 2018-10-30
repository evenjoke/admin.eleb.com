@extends('Layout.default')

@section('contents')
    <form method="get">
        名称<input type="text" name="name" value="{{old('name')}}">
        价格区间<input type="date" value="{{old('min_price')}}" name="start_time">————<input type="date" value="{{old('max_price')}}" name="end_time">
        <button type="submit"   class="btn btn-primary ">搜索</button>
    </form>
    <table class="table table-bordered table-striped">
        <tr>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        @foreach ($activitys as $activity)

            <tr>
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->content }}</td>
                <td>{{$activity->start_time}}</td>
                <td>{{ $activity->end_time }}</td>
                <td>
                    <a href="{{route('activity.create')}}" class="btn btn-default">新增</a>
                    <a href="{{route('activity.edit',[ $activity->id] )}}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{route('activity.destroy',[$activity->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$activitys->links()}}
@endsection