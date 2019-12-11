@extends('layouts.app') 
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i>Matoleo </h1>
        <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <li class="breadcrumb-item">Matoleo Members</li>
        <li class="breadcrumb-item"><a href="{{url('/matoleo')}}"> Matoleo</a></li>
    </ul>
</div>
<div class="row">
    <div class='col-md-2'></div>
    <div class='col-md-8 '>

        <div class="tile">
            {{--<h3 class="tile-title">Add Harambee Here</h3>--}}
    @include('includes.Response_Message')
            <div class="tile-body">
                <div class='row'>
                    <div class='col-md-8'>
                        <h3 class="tile-title">Michango MbaliMbali</h3><h6>(Harambee)</h6>


                    </div>
                    <div class="col-md-4">
                        <h6 class='pull-right'><a class="nav-link " title="click to add" data-toggle="modal" data-target="#add"><button class="btn btn-success" style="border-radius:70%"><span class="fa fa-plus " ></span></button></a></h6>
                    </div>
                </div>

                <table class="table table-borderless">
                    @if(!$matoleo->isEmpty())
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Kigango</th>
                            <th>Kwa Ajili</th>
                            <th>Kiasi</th>
                        </tr>

                        </thead>
                        <tbody>

                        @foreach ($matoleo as $mato)
                            <tr>
                                <td>{{$mato->matoleo->date}}</td>
                                <td>{{$mato->kigango}}</td>
                                {{-- <td>ya:{{$mato->misa}}</td> --}}
                                <td>{{$mato->title}}</td>
                                <td>{{$mato->amount}}</td>

                            </tr>
                        @endforeach


                        @else
                            <div class='alert alert-info'>
                                <h6>There is no any record at this time</h6>
                            </div>
                        @endif

                        </tbody>

                </table>
                {{$matoleo->links()}}

                {{--ADD MODEL--}}
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add new  Record</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="user-form" action="{{route('other.store')}}" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                    <input type="hidden" class="form-control" name="misa_id" value={{$misa_id}}>
                                    <div class="" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">

                                        <div class="form-group row">
                                            <label for="Amount" class='col-md-2'>Kigango</label>
                                            <div class='col-md-10'>
                                                <select class='form-control' name="kigango">
                                                    <option>-----Choose Kigango-------</option>
                                                    @if(!$vigango->isEmpty())
                                                        @foreach ($vigango as $kigango )
                                                            <option value='{{$kigango->name}}'>{{$kigango->name}}</option>
                                                        @endforeach
                                                    @else
                                                        <option>Hamna Kigango kwa sasa</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="title" class='col-md-2'>Title</label>
                                            <div class='col-md-10'>
                                                <input type="text" class="form-control" name="title" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2" for="phone">Description</label>
                                            <div class='col-md-10'>
                                                <textarea class="form-control" name="description" row='5'></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class='col-md-2' for="Amount">Amount</label>
                                            <div class='col-md-10'>
                                                <input class="form-control" type="text" name="amount" required>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="tile-footer">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button id="submit" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Harambee</button>&nbsp;&nbsp;&nbsp;

                                            </div>

                                            <div class="col-md-4">
                                                <div class="pull-right">
                                                    <p><strong style="color:red;">*</strong>Required</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>


            </div>



        </div>
    </div>
    <div class='col-md-2'></div>

</div>
@endsection