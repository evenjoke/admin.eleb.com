@include('Layout._head')
@include('Layout._nav')
<div class="container">
    @include('Layout._notice')
    @yield('contents')
</div>


@include('Layout._foot')