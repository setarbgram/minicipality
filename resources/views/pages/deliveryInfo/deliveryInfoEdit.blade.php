@extends('layout.admin.index')
@section('title')
    تحویل
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
    @php
        $deliveryType=($delivery['type']==0)?'تحویل موقت':'تحویل قطعی'
    @endphp
    <form role="form" id="form" method="post" action="{{route('deliveryInfo-update',$delivery['id'])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="margin-top: 30px;">
            {{--<input type="hidden" id="dtype" name="dtype" value="{{$delivery['type']}}">--}}

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ویرایش {{$deliveryType}} </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="contractID">شماره ی قرارداد:</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <select class="form-control" type="text" name="contractID" id="contractID">
                                            @foreach($cotractNum as $num)
                                                <option value="{{$num}}" {{($delivery['contractID']==$num)?"Selected":""}}>{{$num}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="deliveryType">نوع تحویل :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <select class="form-control" type="text" name="deliveryType" id="deliveryType">
                                            @foreach($types as $type)
                                                <option value="{{$type['typeNO']}}" {{($delivery['deliveryType']==$type['typeNO'])?"Selected":""}}>{{$type['type']}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="requestID">
                                            شماره درخواست پیمانکار :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="requestID"
                                               id="requestID" value="{{$delivery['requestID']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="requestDate">
                                            تاریخ درخواست پیمانکار : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="requestDate"
                                               id="requestDate" value="{{$delivery['requestDate']}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="invitationID">
                                            شماره دعوتنامه :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="invitationID"
                                               id="invitationID" value="{{$delivery['invitationID']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="invitationDate">
                                            تاریخ دعوتنامه : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="invitationDate"
                                               id="invitationDate" value="{{$delivery['invitationDate']}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="communicationID">
                                            شماره ابلاغ صورت مجلس :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="communicationID"
                                               id="communicationID" value="{{$delivery['communicationID']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="communicationDate">
                                            تاریخ ابلاغ صورت مجلس :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="communicationDate"
                                               id="communicationDate" value="{{$delivery['communicationDate']}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="commissionDate">
                                            تاریخ جلسه کمیسیون:</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="commissionDate"
                                               id="commissionDate" value="{{$delivery['commissionDate']}}">
                                    </div>
                                </div>
                            </div>



                            <div id="hasEstimateDiv" class=" col-lg-6 col-sm-12 col-xs-12 ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="hasEstimate">
                                            ارزیابی شیت :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <select class="form-control" type="text" name="hasEstimate" id="hasEstimate">
                                            <option value="0" {{($delivery['hasEstimate']=="0")?"Selected":""}}>دارد</option>
                                            <option value="1" {{($delivery['hasEstimate']=="1")?"Selected":""}}>ندارد</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="tFile1" class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="file1">فایل اسکن
                                            شده: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="file" name="file1" id="file1"
                                               accept="application/pdf">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="dFile1" class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="file1">فایل اسکن
                                            شده: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="file" name="file1" id="file1"
                                               accept="application/pdf">

                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="file2">
                                            اظهار نظر مشاور : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="file" name="file2" id="file2"
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
                                    <button class="btn btn-primary main-btn" type="submit" id="submitBtn">
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
        $(document).ready(function () {
            var type='{{$delivery['type']}}';
            if(type==0){
                document.getElementById('hasEstimateDiv').style.display='none';
                document.getElementById('dFile1').style.display='none';
                document.getElementById('tFile1').style.display='block';

            }else{
                document.getElementById('hasEstimateDiv').style.display='block';
                document.getElementById('dFile1').style.display='block';
                document.getElementById('tFile1').style.display='none';
            }



            $("#form").validate({
                rules: {
                    contractID: {
                        required: true
                    },
                    requestDate: {
                        required: true
                    },
                    invitationDate: {
                        required: true
                    },
                    commissionDate: {
                        required: true
                    },
                    communicationDate: {
                        required: true
                    }
                }
            })
        });
    </script>
@endsection