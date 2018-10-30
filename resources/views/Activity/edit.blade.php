@extends('Layout.default')
@section('contents')
    @include('vendor.ueditor.assets')
    @include('Layout._errors')
    <form method="post" style="width:80%"  action="{{ route('activity.update',[$activity]) }}" >
        <div class="form-group" >
            <h1>修改活动</h1>
            <label>活动名</label>
            <input type="text" name="title" value="{{$activity->title}}" class="form-control">
            <label>活动详情</label>
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                });
            </script>

            <!-- 编辑器容器 -->
            <script id="container" name="content" value="{{$activity->content}}" type="text/plain"></script>
            <label>开始时间</label>
            <input type="date" name="start_time" value="{{$activity->start_time}}" style="width: 20%" class="form-control" >
            <label>结束时间</label>
            <input type="date" name="end_time" value="{{$activity->end_time}}" style="width: 20%" class="form-control" >
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <button type="submit" style="float:left" class="btn btn-primary">确认修改</button>
    </form>

@stop