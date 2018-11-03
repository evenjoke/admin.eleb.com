@extends('Layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <tr>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
        </tr>
        @foreach ($activitys as $activity)

            <tr>
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->content }}</td>
                <td>{{$activity->start_time}}</td>
                <td>{{ $activity->end_time }}</td>
            </tr>
        @endforeach
    </table>
    {{$activitys->links()}}
    {{ method_field('GET')}}
@endsection