@extends('Layout.default')
@section('contents')
    @include('vendor.ueditor.assets')
    @include('Layout._errors')
    <form method="post" style="width:80%" enctype="multipart/form-data"  action="{{ route('activity.store') }}" >
        <div class="form-group" >
            <h1>添加活动</h1>
            <label>活动名</label>
                    <input type="text" name="title" class="form-control" placeholder="活动名称">
            <label>活动详情</label>
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                });
            </script>

            <!-- 编辑器容器 -->
            <script id="container" name="content" type="text/plain"></script>
            <label>开始时间</label>
                    <input type="date" name="start_time" style="width: 20%" class="form-control" >
            <label>结束时间</label>
                    <input type="date" name="end_time" style="width: 20%" class="form-control" >
        {{ csrf_field() }}
        <button type="submit" style="float:left" class="btn btn-primary">确认添加</button>
    </form>

@stop