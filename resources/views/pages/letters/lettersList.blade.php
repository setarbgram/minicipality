@extends('layout.admin.index')
@section('title')
    لیست
@endsection
@section('styles')
    <style>

    </style>
@endsection
@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-lg-10">
            <h2> لیست مکاتبات </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست مکاتبات</strong>
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
                        لیست مکاتبات
                    </h5>

                </div>

                <div class="ibox-content">


                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a id="notificationsTab" class="nav-link active" data-toggle="tab" href="#notifications" >اخطار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cementfactory"> سیمان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#driving">راهنمایی و رانندگی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fuel">سوخت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#release">آزادسازی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#insurance">بیمه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#recertification">اصلاحیه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#others">متفرقه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#laboratory">آزمایشگاه</a>
                        </li>
                    </ul>



                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="notifications" class="container tab-pane active" style="min-height: 200px"><br>
                            <form id="notificationsForm" method="post" action="">
{{--                                {{method_field('DELETE')}}--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="notificationsForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($notifications as $notification)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="notification_check[]" value="{{$notification['id']}}">  <a  href="{{route('notifications-edit',$notification['id'])}}">{{$notification['contractID']}}</a></td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('notifications')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف اخطار</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="notifications_delete" id="notifications_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$notifications->links()}}
                                </div>

                            </form>
                        </div>

                        {{-------------------------------------finish notifications--------------------------------------}}


                        <div id="cementfactory" class="container tab-pane fade"><br>
                            <form id="cementfactoryForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="cementfactoryForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cementfactories as $cementfactory)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="cementfactory_check[]" value="{{$cementfactory['id']}}">  <a href="{{route('cementfactory-edit',$cementfactory['id'])}}">{{$cementfactory['contractID']}}</a></td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('cementfactory')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف سیمان</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="ceman_delete" id="ceman_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$cementfactories->links()}}
                                </div>

                            </form>
                        </div>


                        {{-------------------------------------finish cementfactory--------------------------------------}}
                        <div id="driving" class="container tab-pane fade"><br>
                            <form id="drivingForm" method="post" action="">

                                {{ csrf_field() }}
                                <input type="hidden" value="drivingForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($drivings as $driving)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="driving_check[]" value="{{$driving['id']}}">  <a href="{{route('driving-edit',$driving['id'])}}">{{$driving['contractID']}}</a></td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('driving')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف راهنمایی و رانندگی</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="driving_delete" id="driving_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$drivings->links()}}
                                </div>

                            </form>

                        </div>


                        {{-------------------------------------finish driving--------------------------------------}}

                        <div id="fuel" class="container tab-pane fade"><br>
                                <form id="fuelsForm" method="post" action="">

                                    {{ csrf_field() }}
                                    <input type="hidden" value="fuelsForm" name="formType">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>شماره قرارداد </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($fuels as $fuel)
                                                <tr>
                                                    <td><input type="checkbox" class="i-checks shenase_check" name="fuel_check[]" value="{{$fuel['id']}}">  <a href="{{route('fuel-edit',$fuel['id'])}}">{{$fuel['contractID']}}</a></td>

                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">

                                        <div style="margin: 0 24px;float: right;">
                                            <a href="{{route('fuel')}}" class="btn btn-primary">
                                                <i class="fa fa-plus"></i>
                                                تعریف سوخت </a>
                                        </div>
                                        <div style="float: right">
                                            <button class="btn btn-primary" name="fuel_delete" id="fuel_delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                حذف</button>
                                        </div>
                                    </div>
                                    <div class="col-12 paginate" >
                                        {{$fuels->links()}}
                                    </div>

                                </form>
                        </div>

                        {{-------------------------------------finish fuel--------------------------------------}}

                        <div id="release" class="container tab-pane fade"><br>

                            <form id="releaseForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="releaseForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($releases as $release)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="release_check[]" value="{{$release['id']}}">  <a href="{{route('release-edit',$release['id'])}}">{{$release['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('release')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف آزادسازی </a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="release_delete" id="release_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$releases->links()}}
                                </div>

                            </form>

                        </div>

                        {{-------------------------------------finish release--------------------------------------}}
                        <div id="insurance" class="container tab-pane fade"><br>
                            <form id="insuranceForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="insuranceForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($insurances as $insurance)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="insurance_check[]" value="{{$insurance['id']}}">  <a href="{{route('insurance-edit',$insurance['id'])}}">{{$insurance['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('insurance')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف بیمه </a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="insurance_delete" id="insurance_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$insurances->links()}}
                                </div>

                            </form>
                        </div>
                        {{-------------------------------------finish insurance--------------------------------------}}

                        <div id="recertification" class="container tab-pane fade"><br>
                            <form id="recertificationForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="recertificationForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recertifications as $recertification)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="recertification_check[]" value="{{$recertification['id']}}">  <a href="{{route('recertification-edit',$recertification['id'])}}">{{$recertification['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('recertification')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف اصلاحیه </a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="recertification_delete" id="recertification_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$recertifications->links()}}
                                </div>

                            </form>
                        </div>
                        {{-------------------------------------finish recertification--------------------------------------}}
                        <div id="others" class="container tab-pane fade"><br>
                            <form id="otherForm" method="post" action="">
{{--                                {{method_field('DELETE')}}--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="otherForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($others as $other)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="other_check[]" value="{{$other['id']}}">  <a href="{{route('others-edit',$other['id'])}}">{{$other['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('others')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف متفرقه </a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="others_delete" id="others_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$others->links()}}
                                </div>

                            </form>

                        </div>
                        {{-------------------------------------finish others--------------------------------------}}
                        <div id="laboratory" class="container tab-pane fade"><br>
                            <form id="laboratoryForm" method="post" action="">
{{--                                {{method_field('DELETE')}}--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="laboratoryForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laboratories as $laboratory)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="laboratory_check[]" value="{{$laboratory['id']}}">  <a href="{{route('laboratory-edit',$laboratory['id'])}}">{{$laboratory['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('laboratory')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف آزمایشگاه </a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="laboratory_delete" id="laboratory_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$laboratories->links()}}
                                </div>

                            </form>

                        </div>
                        {{-------------------------------------finish laboratory--------------------------------------}}


                    </div>
                </div>

                </div>

            </div>


        </div>


@endsection


@section('scripts')

    <script>
        $(document).ready(function () {
            $('#notificationsTab').trigger('click');

            // document.querySelectorAll('[rel="prev"]').innerHTML = "»";
            // document.querySelectorAll('[rel="next"]').innerHTML = "«";
            // var list = document.getElementsByClassName("pagination").lastChild.lastChild.innerHTML;


        });


        document.getElementById("notifications_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('notificationsForm');
        });
        document.getElementById("ceman_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('cementfactoryForm');
        });
        document.getElementById("driving_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('drivingForm');
        });
        document.getElementById("fuel_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('fuelsForm');
        });
        document.getElementById("release_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('releaseForm');
        });
        document.getElementById("insurance_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('insuranceForm');
        });
        document.getElementById("recertification_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('recertificationForm');
        });
        document.getElementById("others_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('otherForm');
        });
        document.getElementById("laboratory_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('laboratoryForm');
        });


        var archiveActivity = function (formID) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/services/archiveActivity/"+formID,
                type: "post",
                dataType: "json",
                data: $('#'+formID).serialize()
            }).done(function (res) {

                if (res == '0') {
                    toastr.warning('ابتدا موارد مورد نظر را انتخاب کنید.');
                }
                else {
                    location.reload();
                    toastr.success('مورد / موارد موردنظر با موفقیت حذف شد!');
                }

            }).fail(function (e) {
                if (e.status == 500) {
                    toastr.warning("خطا. زمان شما جهت ورود منقضی شده. مجددا وارد سیسیتم شوید.");
                    window.location.href = '/logout';
                } else if (e.status == 400) {
                    toastr.warning("خطا در برقراری ارتباط با سرور. لطفا مجددا تلاش کنید.");
                } else {
                    toastr.warning("خطا در برقراری ارتباط با سرور. لطفا مجددا تلاش کنید.");
                }

            });

        };

    </script>

@endsection