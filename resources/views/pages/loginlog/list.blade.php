@extends('layout.admin.index')
@section('title')
  لیست گزارش ورود
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
            <h2>لیست گزارش ورود</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست گزارش ورود</strong>
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
                        لیست گزارش ورود
                    </h5>

                </div>
                <div class="ibox-content">

                    <form id="adminForm" method="post" action="">
                        {{--{{method_field('DELETE')}}--}}
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    {{--<th># </th>--}}
                                    <th>نام کاربری </th>
                                    <th>تاریخ</th>
                                    <th>ساعت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loginLogs as $log)
                                    <tr>

                                        {{--<td><span class="pie">{{$log['id']}}</span></td>--}}
                                        <td>{{--<a href="{{route('user.edit',$operator['id'])}}">--}}
                                            {{($log->user['username'])?$log->user['username']:'کاربر حذف شده'}}
                                            {{--</a>--}}</td>
                                        <td>{{\App\Helper\miladiToShamsi($log['created_at'])}}</td>
                                        <td>{{\App\Helper\timeFormat($log['created_at'])}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $loginLogs->links() }}
                        </div>
                        {{--<div class="row">--}}

                            {{--<div style="margin: 0 24px;float: right;">--}}
                                {{--<a href="{{route('user.add')}}" class="btn btn-primary">--}}
                                    {{--<i class="fa fa-plus"></i>--}}
                                    {{--Add User</a>--}}
                            {{--</div>--}}
                            {{--<div style="float: right">--}}
                                {{--<button class="btn btn-primary" name="bulk_delete" id="bulk_delete">--}}
                                    {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
                                    {{--Delete</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function(){
            $("li.navbar_loginLogs").addClass("active");

        });
    </script>

@endsection