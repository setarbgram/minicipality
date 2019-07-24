<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>

                           <div style="width:70px; height: 70px; background-size: cover; border-radius: 50px;{{(Auth::user()->userImage)?"background-image: url('/uploads/usersImage/".Auth::user()->userImage."');":"background-image: url('/img/admin/userImg.jpg');"}}; "></div>

                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->first_name.' '.Auth::user()->last_name}}</strong>
                             </span>
                                <span class="text-muted text-xs block"> <b class="caret"></b></span>
                            </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{route('main_panel')}}">پروفایل</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}">خروج</a></li>
                    </ul>
                </div>
                <div class="logo-element">

                </div>
            </li>




            <li class="users">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">کاربر</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse users_sub">
                    <li class="user_list">
                        <a href="{{route('users')}}"><span class="nav-label">لیست کاربران</span></a>
                    </li>

                    <li class="user_add">
                        <a href="{{route('user.add')}}">
                            <span class="nav-label">تعریف کاربر</span>
                        </a>
                    </li>

                    <li class="navbar_loginLogs">
                        <a>
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <span class="nav-label">گزارش ورود</span></a>
                    </li>

                </ul>
            </li>



            <li class="documents">
                <a href="#">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                    <span class="nav-label">مراحل تشکیل پرونده</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse users_sub">
                    <li class="contractor">
                        <a href="{{route('contractor-list')}}"><span class="nav-label">شناسنامه پیمان</span></a>
                    </li>

                    <li class="work-order">
                        <a href="{{--{{route('work.order')}}--}}">
                            <span class="nav-label">دستور کار</span>
                        </a>
                    </li>

                    <li class="navbar_loginLogs">
                        <a>
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <span class="nav-label">گزارش ورود</span></a>
                    </li>
                    <li class="session">
                        <a href="{{--{{route('session.letter')}}--}}"><span class="nav-label">صورت جلسه</span></a>
                    </li>

                    <li class="practical.property">
                        <a href="{{--{{route('practical.property')}}--}}">
                            <span class="nav-label">مشخصات فنی</span>
                        </a>
                    </li>

                    <li class="letters">
                        <a href="{{--{{route('letters')}}--}}"><span class="nav-label">مکاتبات</span></a>
                    </li>

                    <li class="work-status">
                        <a href="{{--{{route('work.status')}}--}}">
                            <span class="nav-label">صورت وضعیت</span>
                        </a>
                    </li>

                    <li class="delivery-info">
                        <a href="{{--{{route('delivery.info')}}--}}">
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <span class="nav-label">مشخصات تحویل</span></a>
                    </li>

                    <li class="announcement-info">
                        <a href="{{--{{route('announcement.info')}}--}}">
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <span class="nav-label">ابلاغیه</span></a>
                    </li>

                </ul>
            </li>




        </ul>

    </div>
</nav>