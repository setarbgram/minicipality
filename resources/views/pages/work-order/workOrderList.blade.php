@extends('layout.admin.index')
@section('title')
   لیست دستور کار
@endsection
@section('styles')
    <style>

    </style>
@endsection
@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>  لیست دستور کار </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست دستور کار</strong>
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
                        لیست دستور کار
                    </h5>

                </div>
                <div class="ibox-content">

                    <form id="adminForm" method="post" action="">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>شماره قرارداد </th>
                                    <th>شماره ی دستور کار</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks shenase_check" name="order_check[]" value="{{$order['id']}}">  <a href="{{route('workOrder-edit',$order['id'])}}">{{$order['contractID']}}</a></td>
                                        <td>{{$order['instructionID']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div style="margin: 0 24px;float: right;">
                                <a href="{{route('workOrder')}}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    تعریف دستور کار</a>
                            </div>
                            <div style="float: right">
                                <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    حذف</button>
                            </div>
                        </div>
                        <div class="col-12 paginate" >
                            {{$orders->links()}}
                        </div>

                    </form>
                </div>

            </div>


        </div>

    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function(){

            // document.querySelectorAll('[rel="prev"]').innerHTML = "»";
            // document.querySelectorAll('[rel="next"]').innerHTML = "«";
           // var list = document.getElementsByClassName("pagination").lastChild.lastChild.innerHTML;


        });
    </script>

@endsection