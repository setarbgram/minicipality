@extends('layout.admin.index')
@section('title')
    لیست
@endsection
@section('styles')
    ]
@endsection

@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-lg-10">
            <h2> لیست مشخصات فنی </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست مشخصات فنی</strong>
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
                        لیست مشخصات فنی
                    </h5>

                </div>

                <div class="ibox-content">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a id="rasteTab" class="nav-link active" data-toggle="tab" href="#raste">رسته نوع
                                برآورد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#zarayeb">ضرایب متعلقه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sheet">شیت های آزمایشگاهی</a>
                        </li>
                    </ul>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="raste" class="container tab-pane active" style="min-height: 200px"><br>

                            <form id="rasteForm" name="rasteForm" method="post" action="">
                                {{--{{method_field('DELETE')}}--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="rasteForm" name="formType">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rastes as $raste)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check"
                                                           name="raste_check[]" value="{{$raste['id']}}"> <a
                                                            href="{{route('raste-edit',$raste['id'])}}">{{$raste['contractID']}}</a>
                                                </td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">

                                        <a href="{{route('raste-create')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف رسته نوع برآورد</a>
                                    </div>
                                    <div style="float: right">

                                        <button class="btn btn-primary"
                                                name="raste_delete" id="raste_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 paginate">
                                    {{$rastes->links()}}
                                </div>

                            </form>

                        </div>
                        {{-------------------------------------finish Raste--------------------------------------}}
                        <div id="zarayeb" class="container tab-pane fade"><br>


                            <form id="zarayebForm" method="post" action="">

                                {{-- {{method_field('DELETE')}}--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="zarayebForm" name="formType">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($zarayebs as $zarayeb)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check"
                                                           name="zarayeb_check[]" value="{{$zarayeb['id']}}"> <a
                                                            href="{{route('zarayeb-edit',$zarayeb['id'])}}">{{$zarayeb['contractID']}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">

                                        <a href="{{route('zarayeb-create')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف ضرایب متعلقه</a>
                                    </div>
                                    <div style="float: right">

                                        <button class="btn btn-primary"
                                                name="zarayeb_delete" id="zarayeb_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 paginate">
                                    {{$zarayebs->links()}}
                                </div>

                            </form>
                        </div>
                        {{-------------------------------------finish zarayeb--------------------------------------}}
                        <div id="sheet" class="container tab-pane fade"><br>


                            <form id="sheetForm" method="post" action="">
                                {{--{{method_field('DELETE')}}--}}
                                {{ csrf_field() }}
                                <input type="hidden" value="sheetForm" name="formType">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sheets as $sheet)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check"
                                                           name="sheet_check[]" value="{{$sheet['id']}}"> <a
                                                            href="{{route('sheet-edit',$sheet['id'])}}">{{$sheet['contractID']}}</a>
                                                </td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">

                                        <a href="{{route('sheet-create')}}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف شیت آزمایشگاهی</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary"
                                                name="sheet_delete" id="sheet_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 paginate">
                                    {{$sheets->links()}}
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>



@endsection


@section('scripts')

    <script>
        $(document).ready(function () {

            $('#rasteTab').trigger('click');
// document.querySelectorAll('[rel="prev"]').innerHTML = "»";
            // document.querySelectorAll('[rel="next"]').innerHTML = "«";
            // var list = document.getElementsByClassName("pagination").lastChild.lastChild.innerHTML;


        });


        document.getElementById("sheet_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('sheetForm');
        });

        document.getElementById("zarayeb_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('zarayebForm');
         });

        document.getElementById("raste_delete").addEventListener("click", function (event) {
            event.preventDefault();
            archiveActivity('rasteForm');
        });


        var archiveActivity = function (formID) {


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/services/archiveProperty/"+formID,
                type: "post",
                dataType: "json",
                data: $('#'+formID).serialize()
            }).done(function (res) {
                if (res == '0') {
                    toastr.warning('انتخاب یک مورد الزامی است!');
                }
                else {
                    location.reload();
                    toastr.success('مورد / موارد موردنظر با موفقیت حذف شد!');
                }

            }).fail(function (e) {
                if (e.status == 500) {
                    toastr.warning("خطا در برقراری ارتباط با سرور. لطفا مجددا تلاش کنید.");
                    window.location.href = '/logout';
                } else if (e.status == 400) {
                    toastr.warning("انتخاب یک مورد الزامی است!");
                } else {
                    toastr.warning("انتخاب یک مورد الزامی است!");
                }

            });

        };
    </script>

@endsection