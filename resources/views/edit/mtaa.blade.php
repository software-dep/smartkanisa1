@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Church unit </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Church unit</li>
            <li class="breadcrumb-item"><a href="{{url('/Parokia')}}">Manage Street</a></li>
        </ul>
    </div>
    <div class="row">



        <div class="col-md-8 offset-md-2">

            <div class="tile">
                <h3 class="tile-title">Edit Street</h3>
                <div class="tile-body">
                    <form class="form-horizontal" method="POST" action="{{route('Mitaa.update',$mtaa->id)}}" id="section-form" >
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="control-label col-md-3">Select outstation&nbsp; <strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <select  class="form-control" name="vigango_id">
                                    <option value="{{$mtaa->kigango->id}}">{{$mtaa->kigango->name}}</option>
                                    @foreach($vigango as $kigango)
                                        <option value="{{$kigango->id}}" >{{$kigango->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Street name&nbsp;<strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter Parish Name" name="street"  value="{{$mtaa->name}}" required>
                            </div>

                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button  type="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Street</button>
                                </div>

                                <div class="col-md-4">
                                    <div class="pull-right"><p><strong style="color:red;">*</strong>&nbsp;&nbsp;Required</p></div>
                                </div>

                            </div>


                        </div>

                    </form>

                </div>



            </div>

        </div>

    </div>

    <div class="col-md-2"></div>

    </div>


@endsection
