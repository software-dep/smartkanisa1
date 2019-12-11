@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-money"></i>Church Donations </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Church unit</li>
            <li class="breadcrumb-item"><a href="{{url('/Donation')}}">Manage Donation</a></li>
        </ul>
    </div>

    <manage-michango-component></manage-michango-component>
    {{-- <div class="row">

        <div class="col-md-7">

            <div class="tile">

                <h3 class="tile-title">All Donations</h3>
                @include('includes.Response_Message')
                @if(!$donations->isEmpty())
                    <table  class="table  table-responsive ml-5">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>

                        </thead>

                        <tbody>

                        @foreach($donations as $key=>$donation)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td class="text-capitalize">{{$donation->name}}</td>
                                <td class="text-capitalize">{{$donation->donation_type}}</td>
                                <td class="text-capitalize">{{$donation->amount}}</td>
                                <td>
                                    <a href="{{route('Donation.edit',$donation->id)}}" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil fa-2x"></span></a>
                                    <a data-toggle="modal"  data-target="#delete{{$donation->id}}" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash fa-2x"></span></a>

                                    <div class="modal fade modal-lg" id="delete{{$donation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{$donation->name}} </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                </div>

                      ]''                                          <div class="modal-body d-flex mx-auto justify-content-center row">
                                                                    <div class="col-md-12" style="color: black">
                                                                        <h4>Are sure you want to delete?</h4>
                                                                    </div>


                                                                </div>

                                                                <div class="modal-footer mx-auto">
                                                                    <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                                                    <form action="{{route('Donation.destroy',$donation->id)}}" method="post" name="delete">
                                                                        @csrf
                                                                        <input name="_method" type="hidden" value="DELETE">

                                                                        <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Delete</button>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                </td>



                            </tr>
                        @endforeach

                        </tbody>
                        {{$donations->links()}}
                    </table>
                @else

                    <div class="alert alert-info">
                        <h6>There is no any Parish at this time</h6>
                    </div>
                @endif



            </div>

        </div>

        <div class="col-md-5">

            <div class="tile">
                <h3 class="tile-title">Add Donation</h3>

                <div class="tile-body">

                    <form class="form-horizontal" method="POST" action="{{route('Donation.store')}}" id="section-form"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="control-label col-md-3">Donation Name&nbsp; <strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <input id="" class="form-control" type="text" placeholder="Enter Donation Name" name="name"  required>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Amount&nbsp; <strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <input id="" class="form-control" type="text" placeholder="Enter Donation Amount" name="amount"  required>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Select Donation type&nbsp; <strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <select  class="form-control" name="donation_type">
                                    <option value="member">Member-Donation</option>
                                    <option value="family">family-Donation</option>
                                    <option value="jumuiya">Jumuiya-Donation</option>
                                    <option value="mtaa">Mtaa-Donation</option>
                                    <option value="kigango">Kigango-Donation</option>


                                </select>

                            </div>

                        </div>

                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button id="submit" type="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Outstation</button>
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

