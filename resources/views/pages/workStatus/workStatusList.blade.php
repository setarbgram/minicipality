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
            <h2> لیست صورت وضعیت </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست صورت وضعیت</strong>
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
                        لیست صورت وضعیت
                    </h5>

                </div>

                <div class="ibox-content">


                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a id="temporarystateTab" class="nav-link active" data-toggle="tab" href="#temporarystate" >صورت وضعیت موقت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adjustmentstate">صورت وضعیت تعدیل</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#predefinitestate">صورت وضعیت ماقبل قطعی</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#definitestate"> صورت وضعیت قطعی</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contractextension">تمدید قرارداد</a>
                        </li>

                    </ul>



                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="temporarystate" class="container tab-pane active" style="min-height: 200px"><br>
                            <form id="temporarystateForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="temporarystateForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temporaryStates as $temporaryState)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="temporaryState_check[]" value="{{$temporaryState['id']}}"> <a href="{{route('temporarystate-edit',$temporaryState['id'])}}">{{$temporaryState['contractID']}}</a></td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('temporarystate')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف صورت وضعیت موقت</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="temporarystate_delete" id="temporarystate_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$temporaryStates->links()}}
                                </div>

                            </form>

                        </div>

                        {{-------------------------------------finish temporarystate--------------------------------------}}


                        <div id="adjustmentstate" class="container tab-pane fade"><br>
                            <form id="adjustmentstateForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="adjustmentstateForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($adjustmentstates as $adjustmentState)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="adjustmentState_check[]" value="{{$adjustmentState['id']}}">  <a href="{{route('adjustmentstate-edit',$adjustmentState['id'])}}">{{$adjustmentState['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('adjustmentstate')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف صورت وضعیت تعدیل</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="adjustmentstate_delete" id="adjustmentstate_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$adjustmentstates->links()}}
                                </div>

                            </form>
                        </div>

                        {{-------------------------------------finish adjustmentstate--------------------------------------}}
                        <div id="predefinitestate" class="container tab-pane fade"><br>
                            <form id="predefinitestateForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="predefinitestateForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($predefinitestates as $predefiniteState)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="predefiniteState_check[]" value="{{$predefiniteState['id']}}">  <a href="{{route('predefinitestate-edit',$predefiniteState['id'])}}">{{$predefiniteState['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('predefinitestate')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف صورت وضعیت ماقبل قطعی</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="predefinitestate_delete" id="predefinitestate_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$predefinitestates->links()}}
                                </div>

                            </form>
                        </div>

                        {{-------------------------------------finish predefinitestate--------------------------------------}}

                        <div id="definitestate" class="container tab-pane fade"><br>
                            <form id="definiteStatesForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="definiteStatesForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($definiteStates as $definiteState)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="definiteState_check[]" value="{{$definiteState['id']}}">  <a href="{{route('definitestate-edit',$definiteState['id'])}}">{{$definiteState['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('definitestate')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف صورت وضعیت قطعی</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="definitestate_delete" id="definitestate_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$definiteStates->links()}}
                                </div>


                            </form>
                        </div>

                        {{-------------------------------------finish definitestate--------------------------------------}}
                        <div id="contractextension" class="container tab-pane fade"><br>
                            <form id="contractextensionsForm" method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="contractextensionsForm" name="formType">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contractextensions as $contractextension)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="contractextension_check[]" value="{{$contractextension['id']}}">  <a href="{{route('contractextension-edit',$contractextension['id'])}}">{{$contractextension['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('contractextension')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف تمدید قرارداد</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="contractextension_delete" id="contractextension_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$contractextensions->links()}}
                                </div>


                            </form>
                        </div>

                        {{-------------------------------------finish contractextension--------------------------------------}}


                    </div>
                </div>

            </div>

        </div>


    </div>


@endsection


@section('scripts')

    <script>
        $(document).ready(function () {
            $('#temporarystateTab').trigger('click');

            // document.querySelectorAll('[rel="prev"]').innerHTML = "»";
            // document.querySelectorAll('[rel="next"]').innerHTML = "«";
            // var list = document.getElementsByClassName("pagination").lastChild.lastChild.innerHTML;


        });
    </script>

    <script>
        document.getElementById("temporarystate_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('temporarystateForm');
        });
        document.getElementById("adjustmentstate_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('adjustmentstateForm');
        });
        document.getElementById("predefinitestate_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('predefinitestateForm');
        });
        document.getElementById("definitestate_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('definiteStatesForm');
        });
        document.getElementById("contractextension_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('contractextensionsForm');
        });



        var archiveActivity = function (formID) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/services/archiveStatus/"+formID,
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