


@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i>Church Members </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Church Members</li>
            <li class="breadcrumb-item"><a href="{{url('/Member')}}"> Church Members</a></li>
        </ul>
    </div>

    @php
    $user_info = Auth::user();
    @endphp
    <all-member-component :user_info="{{ json_encode($user_info) }}" ></all-member-component>
    {{-- <div class="row">



            <div class="col-md-12">

                <div class="tile">

                    <h3 class="tile-title">Parish Members</h3>
                    
                   
   @if(!$members ->isEmpty())
                    <table  class="table table-responsive-md table-bordered">
                        <thead class="table-active">
                        <tr>
                            <th>No.</th>
                            <th> Name</th>
                            <th>Number</th>
                            <th>Jumuiya</th>
                            <th>Street</th>
                            <th>Kigango</th>  
                            <th>Member/Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                                @foreach($members as $key=>$member)
                                    <tr>
                                        <td>{{($members->currentpage()-1)* $members->perpage() +$key +1 }}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->number}}</td>
                                        <td>{{$member->family->jumuiya->name}}</td>
                                        <td>{{$member->family->jumuiya->mtaa->name}}</td>
                                        <td>{{$member->family->jumuiya->mtaa->kigango->name}}</td>
                                        


                                        <td><a data-toggle="modal"  data-target="#show{{($member->id)+6}}" class=" bs-popover-auto" title="click to view  user Details">More</a></td>
                                        <td>
                                            <a href="{{route('Member.edit',$member->id)}}" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil fa-2x"></span></a>
                                          @can('isParoko')
                                          <a data-toggle="modal" class="text-info bs-popover-auto" title="Activate/Deactivate"> <span class="fa fa-eye fa-2x"></span></a>
                                            <a data-toggle="modal" data-target="#delete{{$member->id}}" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash fa-2x"></span></a>
                                            
                                            <div class="modal fade modal-lg" id="delete{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{$member->name}}  </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                </div>
                                                                <div class="modal-body d-flex mx-auto justify-content-center row">
                                                                    <div class="col-md-12" style="color: black">
                                                                        <h4>Are sure you want to delete?</h4>
                                                                    </div>
                                                    
                                                    
                                                                </div>
                                                    
                                                                <div class="modal-footer mx-auto">
                                                                    <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                                                    <form action="{{route('Member.destroy',$member->id)}}" method="post" name="delete">
                                                                        @csrf
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                    
                                                                        <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Delete</button>
                                                                    </form>
                                                                </div>
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                           
                                          @endcan
                                        </td>

                                        <div class="modal fade modal-lg" id="show{{($member->id)+6}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$member->name}} Details </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex mx-auto justify-content-center row">

                                                    @include('includes.userDetails')

                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                 



                                    </tr>
                                @endforeach

                       

                        </tbody>

                    </table>
                    @else 
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="alert alert-info">
                               There is no any member at this time!
                            </div>
                        </div>
                        <div class="col-md-1"></div>

                    </div>
                    @endif
                    {{$members->links()}}

                </div>

            </div>

    </div> --}}


@endsection
