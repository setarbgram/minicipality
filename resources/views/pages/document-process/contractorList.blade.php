@extends('layout.admin.index')
@section('title')
    لیست شناسه های پیمان
@endsection
@section('styles')
    <style>

    </style>
@endsection
@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> لیست شناسه های پیمان</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong> لیست شناسه های پیمان</strong>
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
                        لیست شناسه های پیمان
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

                                    <th>موضوع قرارداد</th>
                                    <th>شماره ی پرونده:</th>
                                    <th>نام شرکت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shenases as $shenase)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks shenase_check" name="shenase_check[]"
                                                   value="{{$shenase['id']}}"> <a
                                                    href="{{route('shenase.edit',$shenase['id'])}}">{{$shenase['contractTitle']}}</a>
                                        </td>
                                        <td>{{$shenase['contractNumber']}}</td>
                                        <td>{{$shenase['companyName']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div style="margin: 0 24px;float: right;">
                                <a href="{{route('contractor')}}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    تعریف شناسه پیمان</a>
                            </div>
                            <div style="float: right">
                                <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    حذف
                                </button>
                            </div>
                        </div>
                        <div class="col-12 paginate">
                            {{$shenases->links()}}
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function () {
            // document.querySelectorAll('[rel="prev"]')[0].innerHTML = "»";
            // document.querySelectorAll('[rel="next"]')[0].innerHTML = "«";
        });
    </script>

@endsection