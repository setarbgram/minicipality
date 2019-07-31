@extends('layout.admin.index')
@section('title')
   لیست صورت جلسه
@endsection
@section('styles')
    <style>

    </style>
@endsection
@section('contents')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>  لیست صورت جلسه </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/panel">خانه</a>
                </li>
                {{--<li>--}}
                {{--<a>client</a>--}}
                {{--</li>--}}
                <li class="active">
                    <strong>لیست صورت جلسه</strong>
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
                        لیست صورت جلسه
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
                                    <th>شماره ی صورت جلسه</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sessionLetters as $session)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks shenase_check" name="sessionLetter_check[]" value="{{$session['id']}}">  <a href="{{route('sessionLetter-edit',$session['id'])}}">{{$session['contractID']}}</a></td>
                                        <td>{{$session['recordID']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <div style="margin: 0 24px;float: right;">
                                <a href="{{route('sessionLetter')}}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    تعریف صورت جلسه</a>
                            </div>
                            <div style="float: right">
                                <button class="btn btn-primary" name="bulk_delete" id="bulk_delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    حذف</button>
                            </div>
                        </div>
                        <div class="col-12 paginate" >
                            {{$sessionLetters->links()}}
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