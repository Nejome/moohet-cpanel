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
                <a href="{{url('/admin/settings')}}"><i class="fa fa-cog"></i> الإعدادات</a>
            </li>

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
            <i class="fa fa-envelope fa-fw"></i>@if($new_messages_number > 0) <div class="navigate_number">{{$new_messages_number}}</div>@endif
        </a>
    </li>

    <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            {{--@if($new_notifications_number > 0) <span class="navigate_number">{{$new_notifications_number}}</span> @endif--}}
        </a>

        <ul class="dropdown-menu dropdown-alerts">

            @foreach($admin_global_notifications as $row)
                <li>
                    <a href="{{url('/admin/notifications/'.$row->id.'/show')}}">
                        <div>
                            {{$row->title}}
                            <br>
                            <span class="text-muted small">{{$row->created_at->diffForHumans()}}</span>
                        </div>
                    </a>
                </li>
            @endforeach

            @if(count($admin_global_notifications) > 0)
                <li class="divider"></li>

                <li>
                    <a class="text-center" href="#">
                        <strong>عرض كافة الإشعارات</strong>
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            @else
                <li>
                    <a class="text-center" href="#">
                        <span class="text-muted">لا توجد لديك اشعارات</span>
                    </a>
                </li>

            @endif

        </ul>

    </li>

</ul>
