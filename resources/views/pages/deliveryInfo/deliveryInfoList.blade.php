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
            <h2> لیست مشخصات تحویل </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست مشخصات تحویل</strong>
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
                        لیست مشخصات تحویل
                    </h5>

                </div>

                <div class="ibox-content">


                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a id="temporaryDeliveryTab" class="nav-link active" data-toggle="tab" href="#temporaryDelivery" >تحویل موقت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#definiteDelivery"> تحویل قطعی</a>
                        </li>

                    </ul>



                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="temporaryDelivery" class="container tab-pane active" style="min-height: 200px"><br>
                            <form id="temporaryDeliveryForm" method="post" action="">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                            <th>تاریخ درخواست پیمانکار</th>
                                            <th>تاریخ تاریخ دعوتنامه</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($temporaryDeliveries as $temporaryDelivery)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="temporaryDelivery_check[]" value="{{$temporaryDelivery['id']}}">  <a {{--href="{{$temporaryDelivery('temporaryDelivery-edit',$temporaryDelivery['id'])}}"--}}>{{$temporaryDelivery['contractID']}}</a></td>
                                                <td>{{$temporaryDelivery['requestDate']}}</td>
                                                <td>{{$temporaryDelivery['invitationDate']}}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('temporaryDeliveryShow')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف تحویل موقت</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$temporaryDeliveries->links()}}
                                </div>

                            </form>
                        </div>

                        {{-------------------------------------finish notifications--------------------------------------}}


                        <div id="definiteDelivery" class="container tab-pane fade"><br>
                            <form id="definiteDeliveryForm" method="post" action="">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>شماره قرارداد </th>
                                            <th>تاریخ درخواست پیمانکار</th>
                                            <th>تاریخ تاریخ دعوتنامه</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($definiteDeliveries as $definiteDelivery)
                                            <tr>
                                                <td><input type="checkbox" class="i-checks shenase_check" name="definiteDelivery_check[]" value="{{$definiteDelivery['id']}}">  <a {{--href="{{$definiteDelivery('definiteDelivery-edit',$definiteDelivery['id'])}}"--}}>{{$definiteDelivery['contractID']}}</a></td>
                                                <td>{{$definiteDelivery['requestDate']}}</td>
                                                <td>{{$definiteDelivery['invitationDate']}}</td>


                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    <div style="margin: 0 24px;float: right;">
                                        <a href="{{route('definiteDeliveryShow')}}"
                                           class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            تعریف تحویل قطعی</a>
                                    </div>
                                    <div style="float: right">
                                        <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            حذف</button>
                                    </div>
                                </div>
                                <div class="col-12 paginate" >
                                    {{$definiteDeliveries->links()}}
                                </div>

                            </form>
                        </div>


                        {{-------------------------------------finish cementfactory--------------------------------------}}



                    </div>
                </div>

                </div>

            </div>


        </div>


@endsection


@section('scripts')

    <script>
        $(document).ready(function () {
            $('#temporaryDeliveryTab').trigger('click');

            // document.querySelectorAll('[rel="prev"]').innerHTML = "»";
            // document.querySelectorAll('[rel="next"]').innerHTML = "«";
            // var list = document.getElementsByClassName("pagination").lastChild.lastChild.innerHTML;


        });
    </script>

@endsection