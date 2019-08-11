@extends('layout.admin.index')
@section('title')
    لیست
@endsection
@section('styles')
<<<<<<< HEAD

=======
    <style>

    </style>
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
@endsection
@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">
<<<<<<< HEAD
=======

>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
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
<<<<<<< HEAD
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#raste">رسته نوع برآورد</a>
=======


                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a id="rasteTab" class="nav-link active" data-toggle="tab" href="#raste" >رسته نوع برآورد</a>
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#zarayeb">ضرایب متعلقه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sheet">شیت های آزمایشگاهی</a>
                        </li>
                    </ul>

<<<<<<< HEAD
=======


>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="raste" class="container tab-pane active" style="min-height: 200px"><br>

<<<<<<< HEAD
                            <form id="rasteForm" method="post" action="">
                                {{method_field('DELETE')}}
=======
                            <form id="rasteForm" name="rasteForm" method="post" action="">
                                {{--{{method_field('DELETE')}}--}}
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rastes as $raste)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="raste_check[]" value="{{$raste['id']}}">  <a href="{{route('raste-edit',$raste['id'])}}">{{$raste['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
<<<<<<< HEAD
                                        <a {{--href="{{route('raste')}}"--}} class="btn btn-primary">
=======
                                        <a href="{{route('raste-create')}}" class="btn btn-primary">
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                            <i class="fa fa-plus"></i>
                                            تعریف رسته نوع برآورد</a>
                                    </div>
                                    <div style="float: right">
<<<<<<< HEAD
                                        <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
=======
                                        <button onclick="event.preventDefault();" class="btn btn-primary" name="bulk_delete" id="bulk_delete">
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$rastes->links()}}
                                </div>

                            </form>

                        </div>

                        {{-------------------------------------finish Raste--------------------------------------}}


                        <div id="zarayeb" class="container tab-pane fade"><br>


                            <form id="zarayebForm" method="post" action="">
<<<<<<< HEAD
                                {{method_field('DELETE')}}
=======
{{--                                {{method_field('DELETE')}}--}}
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($zarayebs as $zarayeb)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="zarayeb_check[]" value="{{$zarayeb['id']}}">  <a href="{{route('zarayeb-edit',$zarayeb['id'])}}">{{$zarayeb['contractID']}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
<<<<<<< HEAD
                                        <a {{--href="{{route('raste')}}"--}} class="btn btn-primary">
=======
                                        <a href="{{route('zarayeb-create')}}" class="btn btn-primary">
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                            <i class="fa fa-plus"></i>
                                            تعریف ضرایب متعلقه</a>
                                    </div>
                                    <div style="float: right">
<<<<<<< HEAD
                                        <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
=======
                                        <button onclick="event.preventDefault();" class="btn btn-primary" name="bulk_delete" id="bulk_delete">
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$zarayebs->links()}}
                                </div>

                            </form>
                        </div>


                        {{-------------------------------------finish zarayeb--------------------------------------}}
                        <div id="sheet" class="container tab-pane fade"><br>


                            <form id="sheetForm" method="post" action="">
<<<<<<< HEAD
                                {{method_field('DELETE')}}
=======
                                {{--{{method_field('DELETE')}}--}}
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sheets as $sheet)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="sheet_check[]" value="{{$sheet['id']}}">  <a href="{{route('sheet-edit',$sheet['id'])}}">{{$sheet['contractID']}}</a></td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
<<<<<<< HEAD
                                        <a {{--href="{{route('sheet')}}"--}} class="btn btn-primary">
=======
                                        <a href="{{route('sheet-create')}}" class="btn btn-primary">
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                            <i class="fa fa-plus"></i>
                                            تعریف شیت آزمایشگاهی</a>
                                    </div>
                                    <div style="float: right">
<<<<<<< HEAD
                                        <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
=======
                                        <button onclick="event.preventDefault();" class="btn btn-primary" name="bulk_delete" id="bulk_delete">
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
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
<<<<<<< HEAD
=======
            $('#rasteTab').trigger('click');
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f

            // document.querySelectorAll('[rel="prev"]').innerHTML = "»";
            // document.querySelectorAll('[rel="next"]').innerHTML = "«";
            // var list = document.getElementsByClassName("pagination").lastChild.lastChild.innerHTML;


        });
    </script>

@endsection