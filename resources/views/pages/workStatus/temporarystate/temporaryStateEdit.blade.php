@extends('layout.admin.index')
@section('title')
    صورت وضعیت موقت
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

    <form role="form" id="form" method="post" action="{{route('temporarystate-update',$temporarystate['id'])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="margin-top: 30px;">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ویرایش صورت وضعیت موقت </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <input type="hidden" name="temporarystateId" id="temporarystateId" value="{{$temporarystate['id']}}" >

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
                                                <option value="{{$num}}" {{($temporarystate['contractID']==$num)?"Selected":""}}>{{$num}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="statementID">
                                            شماره ی صورت وضعیت: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="statementID"
                                               id="statementID" value="{{$temporarystate['statementID']}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="secretariatID">شماره دبیرخانه :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">
                                        <input class="form-control" type="text" name="secretariatID"
                                               id="secretariatID" value="{{$temporarystate['secretariatID']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="secretariatDate">
                                            تاریخ دبیرخانه : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="secretariatDate" readonly
                                               id="secretariatDate" value="{{\App\Helper\toPersianDate($temporarystate['secretariatDate'])}}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="contractorAmount">مبلغ ارسالی توسط پیمانکار :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">
                                        <input class="form-control" type="text" name="contractorAmount"
                                               id="contractorAmount" value="{{$temporarystate['contractorAmount']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="supervisorAmount">
                                            مبلغ ارسالی توسط ناظر : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="supervisorAmount"
                                               id="supervisorAmount" value="{{$temporarystate['supervisorAmount']}}">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="technicalAmount">مبلغ رسیدگی فنی :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">
                                        <input class="form-control" type="text" name="technicalAmount"
                                               id="technicalAmount" value="{{$temporarystate['technicalAmount']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="netAmount">
                                            مبلغ خالص صورت وضعیت  : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="netAmount"
                                               id="netAmount" value="{{$temporarystate['netAmount']}}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="prepayment">پیش پرداخت :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <select class="form-control" type="text" name="prepayment" id="prepayment" onChange="displayItem(this.value)">
                                            <option value="1" {{($temporarystate['prepayment']==1)?"Selected":""}}>دارد</option>
                                            <option value="0" {{($temporarystate['prepayment']==0)?"Selected":""}}>ندارد</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div  class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label id="prepaymentPercentLabel" class="control-label label-position" for="prepaymentPercent">
                                            درصد پیش پرداخت: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="prepaymentPercent"
                                               id="prepaymentPercent" value="{{$temporarystate['prepaymentPercent']}}">
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="finalAmount">
                                            مبلغ تایید شده نهایی : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="finalAmount"
                                               id="finalAmount" value="{{$temporarystate['finalAmount']}}">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="file">فایل اسکن
                                            شده: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="file" name="file" id="file"
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
            $(function () {
                $('#secretariatDate').persianDatepicker();
            });

            document.getElementById("prepaymentPercent").disabled = false;
            document.getElementById("prepaymentPercentLabel").style.color = '#676a6c';
            displayItem('{{$temporarystate['prepayment']}}');

            $("#form").validate({
                rules: {
                    contractID: {
                        required: true
                    },
                    technicalAmount:{
                        required: true
                    }
                }
            })
        });

        function displayItem(value) {
            if (value == 0) {
                document.getElementById("prepaymentPercent").disabled = true;
                document.getElementById("prepaymentPercentLabel").style.color = '#d4d4d4';


            } else {
                document.getElementById("prepaymentPercent").disabled = false;
                document.getElementById("prepaymentPercentLabel").style.color = '#676a6c';

            }
        }
    </script>
@endsection