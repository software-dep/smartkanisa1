@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-money"></i>Donations </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Donation </li>
            <li class="breadcrumb-item"><a href="{{url('/Member-Donation')}}">Member Donation</a></li>
        </ul>
    </div>

    <member-donation-component></member-donation-component>
    {{-- <div class="row">

        <div class="col-md-7">

            <div class="tile">

                <h3 class="tile-title">Member Payed<span class="fa-pull-right">
                      <form class="" action="{{route('Member-Donation.index')}}">
                            <div class="form-group row">
                            <div class="col-md-9">
                                <select  class="form-control" name="donation_id">
                                       <option style="color: black">--Choose Donation type--- </option>
                                    @if(isset($purposes))
                                        @foreach($purposes as $purpose )
                                            <option style="color: black" value="{{$purpose->id}}">{{$purpose->name}} </option>
                                        @endforeach
                                    @endif

                                </select>

                            </div>
                                <div class="col-md-3">  <button id="submit" type="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-search"></i></button></div>

                        </div>
                      </form>

                    </span></h3>
                @include('includes.Response_Message')
         
                @if(isset($michango))
                    <table  class="table  table-responsive ">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Donation</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Remained</th>
                        </tr>

                        </thead>

                        <tbody>
                    
                        @foreach($michango->members as $key=>$don )
                            <tr>
                                <td>{{$count++}}</td>
                                <td class="text-capitalize">{{$don->name}}</td>
                                <td class="text-capitalize">{{$michango->name}}</td>
                                <td class="text-capitalize">{{$michango->amount}}</td>
                                <td class="text-capitalize">{{$don->pivot->amount}}</td>
                                <td class="text-capitalize">
                                   @if ( ($michango->amount - $don->pivot->amount) == 0)
                                       <span class="fa fa-check fa-2x ml-1" style="color: #1b4b72"></span>

                                       @elseif(($don->pivot->amount - $michango->amount) > 0)
                                        <span class="fa fa-handshake-o fa-2x ml-1" style="color: #1b4b72"></span>
                                       @else
                                        <span class="text-danger">{{$michango->amount - $don->pivot->amount}}</span>
                                    @endif
                                </td>


                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                  {{--  {{$michango->links()}}--}}
                    {{-- @else
                    <div class="alert alert-heading">
                        <h6>Choose Donation Above</h6>
                    </div>
                @endif


            </div>

        </div>

        <div class="col-md-5">

            <div class="tile">
                <h3 class="tile-title">Member Payment</h3>

                <div class="tile-body">
                    <form method="post" action="{{url('/Member-search')}}" role="search">
                        {{csrf_field()}}
                        <div class="form-group row" >
                            <label class="control-label col-md-3">Search&nbsp;</label>

                                <div class="col-md-4">
                                    <input id="section_name" class="form-control" type="text" placeholder="Enter Member name" name="member"  required>
                                </div>

                                <div class="col-md-3">
                                    <button id="submit" type="submit" class="btn btn-primary"  style=""><i class="fa fa-fw fa-lg fa-search"></i>Search</button>
                                </div>


                        </div>



                    </form>



                    <form class="form-horizontal" method="POST" action="{{route('Member-Donation.store')}}" id="section-form"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="control-label col-md-3">Choose Member&nbsp; <strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <select  class="form-control" name="member_id">
                                    <option >--Choose Member--</option>
                                  @if(isset($members))
                                       @foreach($members as $member )
                                              <option style="color: black" value="{{$member->id}}">{{$member->name}} &nbsp; &nbsp;Jumuiya&nbsp;<span style="color: yellow">{{$member->family->jumuiya->name}}</span></option>
                                       @endforeach
                                       @endif
                                </select>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Purpose&nbsp; <strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <select  class="form-control" name="purpose_id">
                                    <option >--Choose Donation purpose--</option>
                                    @if(isset($purposes))
                                        @foreach($purposes as $purpose )
                                            <option style="color: black" value="{{$purpose->id}}">{{$purpose->name}} </option>
                                        @endforeach
                                    @endif

                                </select>

                            </div>

                        </div>


                        <div class="form-group row">
                            <label class="control-label col-md-3">Amount&nbsp;<strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter Amount" name="amount"  required>
                            </div>

                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button id="submit" type="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Donation</button>
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

    </div> --}} 

    <div class="col-md-2"></div>

    </div>


@endsection

