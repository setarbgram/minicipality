@extends('layout.admin.index')
@section('title')
    بیمه
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

    <form role="form" id="form" method="post" action="{{route('insurance-update',$insurance['id'])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="margin-top: 30px;">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ویرایش بیمه</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <input type="hidden" name="insuranceId" id="insuranceId" value="{{$insurance['id']}}" >

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
                                                <option value="{{$num}}" {{($insurance['contractID']==$num)?"Selected":""}}>{{$num}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4  form-txt-align "><label
                                                class="control-label label-position"
                                                for="subjectNO">موضوع نامه :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group ">

                                        <select class="form-control" type="text" name="subjectNO" id="subjectNO"
                                                onChange="displayItem(this.value)">
                                            @foreach($types as $type)
                                                <option value="{{$type['typeNO']}}" {{($insurance['subjectNO']==$type['typeNO'])?"Selected":""}}>{{$type['type']}}</option>
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
                                        <label class="control-label label-position" for="communicationID">
                                            شماره ابلاغ :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="communicationID"
                                               id="communicationID" value="{{$insurance['communicationID']}}">
                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="communicationDate">
                                            تاریخ ابلاغ :</label>
                                    </div>
                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="communicationDate" readonly
                                               id="communicationDate"  value="{{\App\Helper\toPersianDate($insurance['communicationDate'])}}" >
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label id="branchNOLabel" class="control-label label-position" for="branchNO">
                                            شماره شعبه :</label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <input class="form-control" type="text" name="branchNO"
                                               id="branchNO" value="{{($insurance['branchNO']!="-1")?$insurance['branchNO']:''}}">
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
                $('#communicationDate').persianDatepicker();
            });

            document.getElementById("branchNO").disabled = true;
            document.getElementById("branchNOLabel").style.color = '#d4d4d4';
            displayItem('{{$insurance['subjectNO']}}');

            $("#form").validate({
                rules: {
                    contractID: {
                        required: true
                    }

                }
            })
        });

        function displayItem(value) {
            if (value == 1) {
                document.getElementById("branchNO").disabled = true;
                document.getElementById("branchNOLabel").style.color = '#d4d4d4';


            } else {
                document.getElementById("branchNO").disabled = false;
                document.getElementById("branchNOLabel").style.color = '#676a6c';

            }
        }
    </script>
@endsection