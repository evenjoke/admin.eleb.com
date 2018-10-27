
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PHP大全</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-book"></span>书籍 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">7天入门PHP</a></li>
                        <li><a href="#">PHP高级编程</a></li>
                        <li><a href="#">PHP设计模式</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">论程序员的自我修养</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">颈椎病治疗指南</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}" {{--data-toggle="modal" data-target="#myModal"--}}>登录</a></li>
                @endguest
                @auth
                    <li><a href="{{route('logout')}}" >注销</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">个人中心</a></li>
                        <li><a href="#">我的订单</a></li>
                        <li><a href="{{route('admin.pwd_edit',[Auth::user()])}}">修改密码</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
{{--<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">用户名密码登录</h4>
            </div>
            @include('layout._errors')
            <div class="modal-body">
                <form method="post" action="{{ route('admin.store') }}">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="手机/邮箱/用户名" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="密码" />
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> 下次自动登录
                        </label>
                    </div>
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-block">登录</button>
                </form>

            </div>

            <div class="modal-footer">
                <div>
                    <a href="#" style="float: left">忘记密码</a>
                    <a href="#" style="float: right">短信快捷登录</a>
                </div>
            </div>
        </div>
    </div>
</div>--}}
