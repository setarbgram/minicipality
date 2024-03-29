@extends('layout.admin.index')
@section('title')
    شناسنامه پیمان
@endsection

@section('styles')
    <style>
        @media (min-width: 1200px) {

            .contract-title-input {
                width: 79.333333%;
            }
        }

    </style>
@endsection

@section('contents')

    <form role="form" id="form" method="post" action="{{route('shenase.update',$shenase['id'])}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="shenaseId" id="shenaseId" value="{{$shenase['id']}}" >
        <div class="row" style="margin-top: 30px;">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ویرایش شناسنامه پیمان  </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            {{--<div class=" col-lg-12 col-sm-12 col-xs-12  ">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-2 col-sm-4 form-txt-align ">--}}
                                        {{--<label class="control-label label-position" for="contractTitle">موضوع--}}
                                            {{--قرارداد: </label>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-lg-9 col-sm-8 form-group">--}}

                                        {{--<input class="form-control" type="text" name="contractTitle" id="contractTitle"--}}
                                               {{--value="{{$shenase['contractTitle']}}">--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class=" col-lg-12 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4  form-txt-align">
                                        <label class="control-label label-position"
                                               for="contractTitle"> موضوع قرارداد:</label>
                                    </div>
                                    <div class="col-lg-10 col-sm-8 form-group contract-title-input " >

                                        <input class="form-control" type="text" name="contractTitle"
                                               id="contractTitle" value="{{$shenase['contractTitle']}}">

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="docNumber">شماره ی
                                            پرونده: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="docNumber" id="docNumber"
                                               value="{{$shenase['docNumber']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="contractNumber">شماره ی قرارداد:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="contractNumber"
                                               id="contractNumber" value="{{$shenase['contractNumber']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="contractDate">تاربخ
                                            قرارداد: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="contractDate" id="contractDate"
                                               readonly value="{{\App\Helper\toPersianDate($shenase['contractDate'])}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="requestNumber">شماره ی درخواست:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="requestNumber" id="requestNumber"
                                               value="{{$shenase['requestNumber']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="requestDate">تاربخ
                                            درخواست: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="requestDate" id="requestDate"
                                               readonly value="{{\App\Helper\toPersianDate($shenase['requestDate'])}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="commitmentNumber">شماره ی تعهد:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="commitmentNumber"
                                               id="commitmentNumber" value="{{$shenase['commitmentNumber']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="projectId">کد شناسایی
                                            پروژه: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="projectId" id="projectId"
                                               value="{{$shenase['projectId']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="insuranceId">کد بیمه:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="insuranceId" id="insuranceId"
                                               value="{{$shenase['insuranceId']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="rotbe">رتبه: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="rotbe" id="rotbe"
                                               value="{{$shenase['rotbe']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="managerName">نام مدیرعامل:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="managerName" id="managerName"
                                               value="{{$shenase['managerName']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="companyName">نام شرکت: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="companyName" id="companyName"
                                               value="{{$shenase['companyName']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="companyPhone">تلفن شرکت:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="companyPhone" id="companyPhone"
                                               value="{{$shenase['companyPhone']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="companyAdd">آدرس شرکت: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="companyAdd" id="companyAdd"
                                               value="{{$shenase['companyAdd']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="workType">نوع کار:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="workType" id="workType"
                                               value="{{$shenase['workType']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="observer">دستگاه
                                            نظارت: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="observer" id="observer"
                                               value="{{$shenase['observer']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="projectManager">مدیر پروژه:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="projectManager"
                                               id="projectManager" value="{{$shenase['projectManager']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="firstPrice">مبلغ اولیه
                                            پیمان: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="firstPrice" id="firstPrice"
                                               value="{{$shenase['firstPrice']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="tazminPeriod">دوره تضمین:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="tazminPeriod" id="tazminPeriod"
                                               value="{{$shenase['tazminPeriod']}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="contractPeriod">مدت
                                            پیمان: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="contractPeriod"
                                               id="contractPeriod" value="{{$shenase['contractPeriod']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="paymentType">نوع پرداخت:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <select class="form-control" name="paymentType" id="paymentType">
                                            <option value="1" {{($shenase['paymentType'] == 1 )?'selected':''}} >نقدی
                                            </option>
                                            <option value="2" {{($shenase['paymentType'] == 2 )?'selected':''}}>غیر
                                                نقدی
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="gheireNaghdi">درصد
                                            غیرنقدی: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="gheireNaghdi" id="gheireNaghdi"
                                               value="{{$shenase['gheireNaghdi']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="naghdi">درصد نقدی:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="naghdi" id="naghdi"
                                               value="{{$shenase['naghdi']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="peinmankarChoice">نحوه انتخاب
                                            پیمانکار: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <select class="form-control" name="peinmankarChoice" id="peinmankarChoice">
                                            @foreach($cotractTypes as $type)
                                                <option value="{{$type['typeNO']}}" {{($type['typeNO'] ==$shenase['peinmankarChoice'])?'selected':''}}>{{$type['type']}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="kargozarName">نام کارگزار:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="kargozarName" id="kargozarName"
                                               value="{{$shenase['kargozarName']}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="tavafohname">شماره ی
                                            توافقنامه: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="tavafohname" id="tavafohname"
                                               value="{{$shenase['tavafohname']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="tavafohnameDate">تاریخ:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="tavafohnameDate" readonly
                                               id="tavafohnameDate" value="{{\App\Helper\toPersianDate($shenase['tavafohnameDate'])}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="komesionMoamelatNum">شماره
                                            کمیسیون معاملات: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="komesionMoamelatNum"
                                               id="komesionMoamelatNum" value="{{$shenase['komesionMoamelatNum']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align ">
                                        <label class="control-label label-position"
                                               for="komesionMoamelatNumDate">تاریخ:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="komesionMoamelatNumDate"
                                               id="komesionMoamelatNumDate" readonly
                                               value="{{\App\Helper\toPersianDate($shenase['komesionMoamelatNumDate'])}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="monagheseSessionNumber">شماره
                                            صورتجلسه مناقصه: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="monagheseSessionNumber"
                                               id="monagheseSessionNumber"
                                               value="{{$shenase['monagheseSessionNumber']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="monagheseSessionNumberDate">تاریخ:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="monagheseSessionNumberDate"
                                               id="monagheseSessionNumberDate" readonly
                                               value="{{\App\Helper\toPersianDate($shenase['monagheseSessionNumberDate'])}}">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="permissionNumber">شماره
                                            مجوز: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="permissionNumber"
                                               id="permissionNumber" value="{{$shenase['permissionNumber']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="permissionNumberDate">تاریخ:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="text" name="permissionNumberDate" readonly
                                               id="permissionNumberDate" value="{{\App\Helper\toPersianDate($shenase['permissionNumberDate'])}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="contractTaraf">طرف
                                            قرارداد: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="contractTaraf" id="contractTaraf"
                                               value="{{$shenase['contractTaraf']}}">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                {{--                                <div class="row">--}}
                                {{--                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label class="control-label label-position"--}}
                                {{--                                                                                           for="projectManager">مدیر پروژه:</label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-lg-7 col-sm-8 form-group ">--}}

                                {{--                                        <input class="form-control" type="text" name="projectManager" id="projectManager" >--}}

                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="scannedFile">فایل اسکن
                                            شده: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="file" name="scannedFile" id="scannedFile"
                                               accept="application/pdf">

                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="privacyFile">فایل شرایط خصوصی:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <input class="form-control" type="file" name="privacyFile" id="privacyFile"
                                               accept="application/pdf">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" id="danger-box" style="display: none">
                            <div class="col-sm-12">
                                <div class="{{--form-group col-sm-offset-0--}}">
                                    {{--<label class="text-danger">خطا!!! تعداد بن هایی که به افراد و رده ها اختصاص داده اید بیشتر از تعداد ظرفیت تعریف شده برای این بن می باشد.</label>--}}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                                <div class="{{--form-group col-sm-offset-0--}}">
                                   {{-- <button class="btn btn-primary main-btn" onclick="edit(this)"  type="button" id="submitBtn">--}}
                                    <button class="btn btn-primary main-btn"  type="submit" id="submitBtn">
                                        ویرایش اطلاعات
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </form>

@endsection

@section('scripts')

    <script>
        $( document ).ready(function() {
            $(function () {
                $('#permissionNumberDate').persianDatepicker(/*{
                    selectedBefore: !0
                }*/);
                $('#monagheseSessionNumberDate').persianDatepicker();
                $('#komesionMoamelatNumDate').persianDatepicker();
                $('#tavafohnameDate').persianDatepicker();
                $('#contractDate').persianDatepicker();
                $('#requestDate').persianDatepicker();
            });
        })

        function edit (inp) {
            event.preventDefault();
        }

        $("#form").validate({
            rules: {
                contractTitle: {
                    required: true
                },
                docNumber: {
                    required: true
                },
                contractNumber: {
                    required: true,
                    remote: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/validation/contractNumber",
                        type: "post",
                        data: {
                            contractNumber: function () {
                                return $("#contractNumber").val();
                            },
                            shenaseId: function () {
                                return $('#shenaseId').val();
                            }
                        },
                        dataType: 'json'


                    }
                },
                companyName: {
                    required: true
                },
                companyAdd: {
                    required: true
                },
                observer: {
                    required: true
                }


            }
        });
    </script>
@endsection