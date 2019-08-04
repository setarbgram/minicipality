@extends('layout.admin.index')
@section('title')
    شیت آزمایشگاهی
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

    <form role="form" id="form" method="post" action="{{route('sheet-update',$sheet['id'])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row" style="margin-top: 30px;">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ویرایش شیت آزمایشگاهی</h5>
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
                                                <option value="{{$num}}" {{($sheet['contractID']==$num)?"Selected":""}}>{{$num}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="typeNO">
                                            نوع شیت : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <select class="form-control" type="text" name="typeNO" id="typeNO"
                                                onChange="displayItem(this.value)">
                                            @foreach($types as $type)
                                                <option value="{{$type['typeNO']}}" {{($sheet['typeNO']==$type['typeNO'])?"Selected":""}}>{{$type['type']}}</option>
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
                                        <label id="patternAgeNOLabel"  class="control-label label-position" for="patternAgeNO">
                                            سن نمونه : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">
                                        <select class="form-control" type="text" name="patternAgeNO" id="patternAgeNO">
                                            @foreach($patterns as $pattern)
                                                <option value="{{$pattern['patternAgeNO']}}" {{($sheet['patternAgeNO']==$pattern['patternAgeNO'])?"Selected":""}}>{{$pattern['patternAge']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div id="patternIDLabel" class="col-lg-4 col-sm-4 form-txt-align " >
                                        <label class="control-label label-position" for="patternID">
                                            شماره نمونه: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="patternID"
                                               id="patternID" value="{{$sheet['patternID']}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="communicationID">
                                            شماره ابلاغ : </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="communicationID"
                                               id="communicationID" value="{{$sheet['communicationID']}}">
                                    </div>
                                </div>
                            </div>

                            <div class=" col-lg-6 col-sm-12 col-xs-12  ">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4 form-txt-align ">
                                        <label class="control-label label-position" for="communicationDate">
                                            تاریخ ابلاغ: </label>
                                    </div>

                                    <div class="col-lg-7 col-sm-8 form-group">

                                        <input class="form-control" type="text" name="communicationDate"
                                               id="communicationDate" value="{{$sheet['communicationDate']}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">

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



            document.getElementById("patternAgeNO").disabled = true;
            document.getElementById("patternAgeNOLabel").style.color = '#d4d4d4';
            displayItem('{{$sheet['typeNO']}}');
        });

        function displayItem(value) {
            if (value == 2) {
                document.getElementById("patternAgeNO").disabled = false;
                document.getElementById("patternAgeNOLabel").style.color = '#676a6c';


            } else {
                document.getElementById("patternAgeNO").disabled = true;
                document.getElementById("patternAgeNOLabel  ").style.color = '#d4d4d4';

            }
        }
        $("#form").validate({
            rules: {
                contractID: {
                    required: true
                }
            }
        })

    </script>
@endsection