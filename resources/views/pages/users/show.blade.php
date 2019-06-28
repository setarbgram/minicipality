@extends('layout.admin.index')
@section('title')
   ویرایش کاربر
@endsection
@section('styles')
    <style>
    .workstationConfigForm{
        margin-top:-5px !important;
    }
        .img-box{
            width: 140px;
            height: 156px;
            /*border: 6px solid #9f94d2;*/
            background-size: cover !important;
            /* border-radius: 100px; */
            /* position: absolute; */
            top: 115px;
            background-color: #fff;
            left: 71px;
        }
        .btn-img{
            width:140px;
            margin-top: 10px;
        }
    .select2-container{
        width: 100% !important;
    }
    </style>
    @endsection

@section('contents')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>ویرایش کاربر</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                <li>
                    <a href="{{route('users')}}"> لیست کاربران</a>
                </li>
                <li class="active">
                    <strong>ویرایش کاربر</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>


    <form role="form" id="form" method="post" action="{{route('user.edit',$user['id'])}}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row" style="margin-top: 30px;">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ویرایش کاربر</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">


                        <div class="form-group">
                            <input class="form-control" type="hidden" name="userId" id="userId"
                                   value="{{ $user['id'] }}">
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-3">

                                    <div class="img-box" id="blah" style="
                                         background-color: #ffffff !important;
                                            background:{{($user['userImage'])?"url('/uploads/userImage/".$user['userImage']."')":"url('/img/admin/userImg.jpg')"}} no-repeat;
                                                 ">
                                    </div>

                                    <div class="">
                                        <button type="button" class="btn btn-sm btn-primary m-t-n-xs btn-img" id="buttonid" style="">
                                            <i class="fa fa-image"></i> <strong>آپلود عکس </strong>
                                        </button>

                                        <input type="file" name="userImage" value="{{($user['userImage'])?$user['userImage']:''}}" id="userImage"
                                               class="form-control" style="display: none;">

                                    </div>
                                </div>
                                <div class="col-sm-9">

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="fName">نام</label>
                                            <input type="text" class="form-control" id="fName" name="fName" value="{{$user['first_name']}}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="lName">نام خانوادگی</label>
                                            <input type="text" class="form-control" id="lName" name="lName" value="{{$user['last_name']}}" >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="group_fr">نام کاربری</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{$user['username']}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="password">رمز عبور</label>
                                            <input type="password" class="form-control" id="password" name="password" value="{{$user['password']}}">
                                        </div>

                                    </div>


                                    <div class="form-row">
                                        <div class="col-md-4" style="float: right;">

                                            <div class="form-group col-sm-offset-0" style="float:right;margin-left: 20px;margin-top: 21px;">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-save"></i>
                                                    ثبت
                                                </button>
                                            </div>


                                            <div class="form-group col-sm-offset-0" style="float:right;margin-top: 20px;">
                                                <input type="button" value="لغو" class="btn btn-primary btnClear" id="btnClear">
                                            </div>

                                        </div>



                                    </div>
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


        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();


        $(document).ready(function(){
//            $('.btnClear').click(function(){
//                if(confirm("Want to clear?")){
//                    /*Clear all input type="text" box*/
//                    $('#form input[type="text"]').val('');
//                }
//            });
            $(".select2_station").select2({
                // dir: "rtl"
            });

            $("li.users").addClass("active");
            $("ul.users_sub").addClass("in");
            $("li.user_list").addClass("active");

            document.getElementById('buttonid').addEventListener('click', openDialog);

            function openDialog() {
                document.getElementById('userImage').click();
            }

            $("#userImage").change(function () {


                var regex = /^([a-zA-Z0-9آ-ی\s_\\.\-:])+.(jpg|jpeg|png)$/;

                if (regex.test($(this).val().toLowerCase())) {
                    if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                        $("#blah").show();
                        $("#blah")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                    }
                    else {
                        if (typeof (FileReader) != "undefined") {
                            // $("#blah").hidden();


                            var reader = new FileReader();
                            reader.onload = function (e) {
                                console.log(e.target.result);
                                var html = '<div style="  background-image: url(' + e.target.result + ');  background-size: cover;  background-position: center center;    background-repeat: no-repeat; " class="img-box">' +
                                        '  </div>';

                                $("#blah").html(html);


                            };
                            reader.readAsDataURL($(this)[0].files[0]);
                        } else {
                            alert("This browser does not support FileReader.");
                        }
                    }
                } else {
                    alert("اخطار!!! فرمت تصویر باید به صورت  jpg|.jpeg. باشد.");
                    $("#userImage").val(null);

                }
            });



            $("#form").validate({
                rules: {
                    // squelch:{
                    //     required: true,
                    //     range: [0, 100]
                    // },
                    // bass:{
                    //     required: true,
                    //     range: [0, 100]
                    // },
                    // volume:{
                    //     required: true,
                    //     range: [0, 100]
                    // },
                    // tribble:{
                    //     required: true,
                    //     range: [0, 100]
                    // },
                    username: {
                        required: true,
                        remote: {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "/validation/username",
                            type: "post",
                            data: {
                                username: function () {
                                    return $("#username").val();
                                },
                                userId: function () {
                                    return $("#userId").val();
                                },

                            },
                            dataType: 'json',


                        }

                        },password: {
                        required: true,
                        //   maxlength:254,
                    },



                }
            });

        });
    </script>

    <script type="text/javascript">
        document.getElementById("btnClear").onclick = function () {
            location.href = "{{route('users')}}";
        };
        document.getElementById("btnClears").onclick = function () {
            location.href = "{{route('users')}}";
        };
    </script>


@endsection
