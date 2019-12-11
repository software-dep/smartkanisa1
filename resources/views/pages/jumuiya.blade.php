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
            <li class="breadcrumb-item"><a href="{{url('/Jumuiya')}}">Manage Street</a></li>
        </ul>
    </div>
  

    @php
    $user_info = Auth::user();
    @endphp
 

        <jumuiya-component :user_info="{{ json_encode($user_info) }}"></jumuiya-component>

        

   

   

  


@endsection

{{-- <div class="tile">

    <h3 class="tile-title">All Community</h3>
    @include('includes.Response_Message') @if(!$jumuiya->isEmpty())
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kigango</th>
                <th>Mtaa</th>
                <th>Jumuiya</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

            @foreach($jumuiya as $key=>$community)
            <tr>
                <td>{{($jumuiya->currentpage()-1)* $jumuiya->perpage() +$key +1 }}</td>
                <td class="text-capitalize">{{$community->mtaa->kigango->name}}</td>
                <td class="text-capitalize">{{$community->mtaa->name}}</td>
                <td class="text-capitalize">{{$community->name}}</td>
                <td>
                    <a href="{{route('Jumuiya.edit',$community->id)}}" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil fa-2x"></span></a>
                    <a data-toggle="modal" data-target="#delete{{$community->id}}" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash fa-2x"></span></a>

                    <div class="modal fade modal-lg" id="delete{{$community->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$community->name}} Outstation</h5>
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
                                    <form action="{{route('Jumuiya.destroy',$community->id)}}" method="post" name="delete">
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

    </table>
    {{$jumuiya->links()}} @else

    <div class="alert alert-info">
        <h6>There is no any Street at this time</h6>
    </div>
    @endif


</div> --}}