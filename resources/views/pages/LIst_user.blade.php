@extends('layouts.app')

@section('css')

@endsection

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
            <li class="breadcrumb-item"><a href="{{url('/User')}}">Manage User</a></li>
        </ul>
    </div>



        <div class="col-md-12">
            @include('includes.Response_Message')
            <div class="tile">
                <h3 class="tile-title">All Users</h3>
                <table id="users-table" class="table table-bordered table-responsive-sm">
                    <thead>
                    <tr>

                        <th>@sortablelink('id')</th>
                        <th>@sortablelink('fname')</th>
                        <th>@sortablelink('Phone')</th>
                        <th>@sortablelink('Email')</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>


            @if(!$users->isEmpty())
           <span style="display: none">   {{  $count = 1 }}</span>
                @foreach($users as $key=>$user)
                    <tr>
                    <!-- (index+1)+((current_page-1)*per_page) -->
                        <th>{{$key+ $users->firstItem()}}</th>
                        <td>{{$user->fname}} &nbsp; {{$user->lname}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->user_type}}</td>

                        <td >

                            <a href="{{route('User.edit',$user->id)}}" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>&nbsp;
                            <a data-toggle="modal"  data-target="#activate{{$user->id}}" class="text-info bs-popover-auto" title="click to deactivate"> <span class="fa fa-eye "></span></a>&nbsp;
                            <a data-toggle="modal"  data-target="#delete{{$user->id}}" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>

                            <div class="modal fade modal-lg" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$user->fname}} &nbsp; {{$user->lname}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex mx-auto justify-content-center row">
                                            <div class="col-md-12" style="color: black"><h4>Are sure you want to delete?</h4></div>


                                        </div>

                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                            <form action="{{route('User.destroy',$user->id)}}" method="post" name="delete">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">

                                                <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal-lg" id="activate{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> {{$user->fname}} &nbsp; {{$user->lname}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex mx-auto justify-content-center row">
                                            <div class="col-md-12" style="color: black"><h4>Are sure you want to Deactivate?</h4></div>


                                        </div>

                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                            <form action="{{route('User.destroy',$user->id)}}" method="post" name="delete">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">

                                                <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Deactivate</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>




                    </tr>

                @endforeach



                @else
                <div class="alert alert-info"><h6>There is no users at this time</h6> </div>

            @endif

                    </tbody>


                </table>
                {{$users->links()}}


            </div>

        </div>


    </div>


@endsection

