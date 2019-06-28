@extends('layout.admin.index')

@section('contents')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>تغییر رمز عبور</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div style="padding-top: 3%" class="col-sm-8 b-r">
                                <form role="form" id="form" method="post" action="/panel/change-password" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="form-group">

                                        <label for="presentPassword" class="col-sm-3 control-label" style="text-align: left">
                                       رمز عبور فعلی:

                                        </label>
                                        <div class="col-sm-8"><input type="password" name="presentPassword" id="presentPassword" value=""
                                                                     placeholder="******" class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label for="newPassword" class="col-sm-3 control-label" style="text-align: left">
                                          رمز عبور جدید:
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" id="passwordA" name="newPassword" value=""
                                                   placeholder="******">
                                        </div>
                                    </div>
                                    <div class="form-group"><label for="newPassword_confirmation" style="text-align: left"
                                                                   class="col-sm-3 control-label">
                                         تکرار رمز عبور جدید:
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" name="newPassword_confirmation"
                                                   value="" placeholder="******">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-3">
                                            <button class="btn btn-primary" type="submit"> تغییر رمز عبور</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div style="
                                 background-size: contain; margin-left: auto; background-position: center center;
                                 background-repeat: no-repeat;  height: 100px;
                                 margin-top: 17%;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop
@section('scripts')


    <script>

        $(document).ready(function () {
            $("#form").validate({
                rules: {
                    presentPassword: {
                        required: true,
                    },
                    newPassword: {
                        required: true,
                        minlength: 6
                    },
                    newPassword_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#passwordA"
                    },

                }
            });
        });





    </script>
@stop