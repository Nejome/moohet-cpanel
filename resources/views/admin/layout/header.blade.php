<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand logo_title" href="#">محيط | مدير النظام</a>
</div>


<ul class="nav navbar-top-links navbar-right">

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">

            <li>
                <a href="{{route('users.edit', Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i>بياناتي</a>
            </li>

            <li class="divider"></li>

            <li>
                <a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> تسجيل الخروج</a>
            </li>

        </ul>

    </li>

    <li class="dropdown">
        <a href="{{route('messages.index')}}">
            <i class="fa fa-envelope fa-fw"></i></i>@if($new_messages_number > 0) <div class="navigate_number">{{$new_messages_number}}</div>@endif
        </a>
    </li>

</ul>
