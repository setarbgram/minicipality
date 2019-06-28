@extends('layout.admin.index')
@section('title')
    {{--<title>Account Information</title>--}}
@stop
@section('contents')

    <div id="editAccount" class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>حساب کاربری</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <form role="form" id="form" method="POST" action="/panel" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="userId" id="userId"
                                               value="{{ $user->id }}">
                                    </div>

                                    <div style="padding-bottom: 30px" class="form-group">
                                        <label class="col-sm-2 control-label" for="username">نام کاربری</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="username" name="username"
                                                   value="{{ $user->username }}">
                                        </div>
                                    </div>

                                    <div style="padding-bottom: 30px" class="form-group">
                                        <label class="col-sm-2 control-label" for="first_name">نام </label>
                                        <div class="col-sm-10">
                                            <input lang="fa" class="form-control" type="text" id="fName" name="fName"
                                                   value="{{ $user->first_name }}">
                                        </div>
                                    </div>

                                    <div style="padding-bottom: 30px" class="form-group">
                                        <label class="col-sm-2 control-label" for="last_name">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input lang="fa" class="form-control" type="text" id="lName" name="lName"
                                                   value="{{ $user->last_name }}">
                                        </div>
                                    </div>

                                    <div style="padding-bottom: 30px" class="form-group">
                                        <label class="col-sm-2 control-label" for="email">ایمیل</label>

                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="email" name="email"
                                                   value="{{ $user->email}}">
                                        </div>
                                    </div>

                                    <div style="padding-bottom: 30px" class="form-group">
                                        <label class="col-sm-2 control-label" for="userImage">عکس</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="userImage" name="userImage"
                                                   value="">

                                        </div>
                                    </div>




                                </div>
                                <div class="col-md-4">
                                    <div style="{{($user['userImage'])?"background-image: url('/uploads/usersImage/".$user['userImage']."');":"background-image: url('/img/admin/userImg.jpg');"}};
                                 background-repeat: no-repeat; background-size: contain; margin-top: 12px;  height: 164px;">

                                    </div>
                                </div>
                            </div>


                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group col-sm-offset-8" style=" height: 20px; display: inline;">
                                        <input type="reset" value="لغو"
                                               class="btn btn-primary btn-outline">
                                    </div>
                                    <div class="form-group col-sm-offset-0" style=" height: 20px; display: inline;">
                                        <input type="submit" value="ثبت" class="btn btn-primary ">
                                    </div>
                                    <div class="form-group col-sm-offset-0" style=" height: 20px; display: inline;">
                                        <a href="{{route('change.password')}}" class="btn btn-primary " >تغییر رمز عبور</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="images"></div>

                        <div id="server_response"></div>

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
                    username: {
                        required: true,
                        minlength: 3,
                        remote: {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "/validation/username",
                            type: "post",
                            data: {
                                username: function () {
                                    console.log($("#username").val());
                                    return $("#username").val();
                                },

                                userId: function () {
                                    console.log($("#userId").val());
                                    return $("#userId").val();
                                },

                            },
                            dataType: 'json',


                        }
                    },
                    fName: {
                        required: true,
                    },
                    lName: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    passwordConfirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                }
            });



            $("[lang='ar']").text(function (i, val) {
                return val.replace(/\d/g, function (v) {
                    return String.fromCharCode(v.charCodeAt(0) + 0x06C0);
                });
            });


        });

    </script>

@stop