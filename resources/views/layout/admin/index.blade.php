<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin/base_css_admin/admin_base_css.css">
    <link rel="stylesheet" href="/css/app/plugin/iCheck/custom.css">
    <link rel="stylesheet" href="/css/app/plugin/toastr/toastr.min.css">
    <link rel="stylesheet" href="/css/app/plugin/select2/select2.min.css">

    <style>
        .paginate{
            display: flex;align-self: center;justify-content: center
        }




    </style>
    @yield('styles')


    {{--<style>--}}
        {{--.metismenu .fa.arrow:before {--}}
            {{--content: "\f105";--}}
        {{--}--}}
    {{--</style>--}}

    {{--<title>--}}
        {{--@yield('title')--}}
    {{--</title>--}}
    <title>
        {{config('app.name')}}| @section('pageTitle') پنل ادمین @show
        {{--{{config('app.name')}}@yield('title')--}}
    </title>
</head>
<body class="rtls" style="font-family: IRANSans">

<div id="wrapper">

@include("include.admin.navbar")

    <div id="page-wrapper" class="gray-bg">
      @include("include.admin.topHeader")

        @yield("contents")


@include("include.admin.footer")

    </div>
</div>

<script src="/js/app/base_js/base_admin_js.js"></script>

<script src="/js/app/plugin/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/app/plugin/validate/jquery.validate.min.js"></script>

<script src="/js/app/plugin/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/app/plugin/select2/select2.full.min.js"></script>

<script src="/js/app/main.js"></script>

<!-- iCheck -->
<script src="/js/app/plugin/iCheck/icheck.min.js"></script>
<script src="/js/app/plugin/toastr/toastr.min.js"></script>

<script>
    $(document).ready(function(){

        // document.querySelectorAll('[rel="prev"]')[0].innerHTML = "»";
        // document.querySelectorAll('[rel="next"]')[0].innerHTML = "«";

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        toastr.options = {
            "hideDuration": "1000"
            // "closeButton": true,
            // "progressBar": true,
        };


        @if(session()->has('flash_message'))
                       toastr.success("{{ @session('flash_message') }}");

        @endif
        @if(session()->has('flash_d_message'))
                toastr.warning("{{ @session('flash_d_message') }}");

        @endif

    });
</script>

@yield('scripts')

</body>
</html>