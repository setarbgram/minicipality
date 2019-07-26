<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>

                           <div style="width:70px; height: 70px; background-size: cover; border-radius: 50px;{{(Auth::user()->userImage)?"background-image: url('/uploads/usersImage/".Auth::user()->userImage."');":"background-image: url('/img/admin/userImg.jpg');"}}; "></div>

                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{ Auth::user()->first_name.' '.Auth::user()->last_name}}</strong>
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
                    <span class="nav-label">مدیریت کاربران</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse users_sub">

                    <li class="user_add">
                        <a href="{{route('user.add')}}">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span class="nav-label">ثبت کاربر جدید</span>
                        </a>
                    </li>

                    <li class="user_list">
                        <a href="{{route('users')}}">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <span class="nav-label">جستجوی کاربران</span>
                        </a>
                    </li>


                    <li class="navbar_loginLogs">
                        <a>
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <span class="nav-label">Eventlog</span></a>
                    </li>

                </ul>
            </li>


            <li class="documents">
                <a href="#">
                    <i class="fa fa-folder-open"></i>
                    <span class="nav-label">تشکیل پرونده</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse document_sub">
                    <li class="contractor">
                        <a href="{{route('contractor-list')}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">شناسنامه پیمان</span></a>
                    </li>

                    <li class="work-order">
                        <a href="{{route('workOrder-list')}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">دستور کار</span>
                        </a>
                    </li>


                    <li class="session">
                        <a href="{{--{{route('session.letter')}}--}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">صورت جلسه</span>
                        </a>
                    </li>

                    <li class="practical.property">
                        <a href="{{--{{route('practical.property')}}--}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">مشخصات فنی</span>
                        </a>
                    </li>

                    <li class="letters">
                        <a href="{{--{{route('letters')}}--}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">مکاتبات</span>
                        </a>
                    </li>

                    <li class="work-status">
                        <a href="{{--{{route('work.status')}}--}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">صورت وضعیت</span>
                        </a>
                    </li>

                    <li class="delivery-info">
                        <a href="{{--{{route('delivery.info')}}--}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">مشخصات تحویل</span></a>
                    </li>

                    <li class="announcement-info">
                        <a href="{{--{{route('announcement.info')}}--}}">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <span class="nav-label">ابلاغیه</span></a>
                    </li>

                </ul>
            </li>

            <li class="searchDocument">
                <a href="#">
                    <i class="fa fa-search"></i>
                    <span class="nav-label">جستجوی پرونده</span>
                    <span class="fa arrow"></span>
                </a>
            </li>

            <li class="messages">
                <a href="#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="nav-label">مدیریت پیام ها‍‍</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse messages_sub">

                    <li class="user_add">
                        <a href="{{route('user.add')}}">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span class="nav-label">ارسال پیام جدید</span>
                        </a>
                    </li>

                    <li class="user_list">
                        <a href="{{route('users')}}">
                            <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                            <span class="nav-label">صندوق ورودی </span>
                        </a>
                    </li>


                    <li class="navbar_loginLogs">
                        <a>
                            <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                            <span class="nav-label">صندوق ارسالی</span></a>
                    </li>

                </ul>
            </li>



        </ul>

    </div>
</nav>