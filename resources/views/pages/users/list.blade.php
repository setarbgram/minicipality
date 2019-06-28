@extends('layout.admin.index')
@section('title')
   لیست کاربران
@endsection
@section('styles')
    <style>
        /*.table > tbody > tr > td{*/
        /*text-align: center;*/
        /*}*/
    </style>
@endsection
@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> لیست کاربران</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong> لیست کاربران</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        لیست کاربران
                    </h5>

                </div>
                <div class="ibox-content">

                    <form id="adminForm" method="post" action="">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>نام کاربری </th>
                                    <th>نام </th>
                                    <th>نام خانوادگی</th>
                                 
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="i-checks user_check" name="user_check[]" value="{{$user['id']}}">
                                            <a href="{{route('user.edit',$user['id'])}}">{{$user['username']}}</a>
                                        </td>
                                        <td><a href="{{route('user.edit',$user['id'])}}">{{$user['first_name']}}</a></td>
                                        <td><a href="{{route('user.edit',$user['id'])}}">{{$user['last_name']}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links()}}
                        </div>
                        <div class="row">

                            <div style="margin: 0 24px;float: right;">
                                <a href="{{route('user.add')}}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>

                                تعریف کاربر
                                </a>
                            </div>
                            <div style="float: right">
                                <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    حذف کاربر</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function(){
            $("li.users").addClass("active");
            $("ul.users_sub").addClass("in");
            $("li.user_list").addClass("active");

        });
    </script>

@endsection