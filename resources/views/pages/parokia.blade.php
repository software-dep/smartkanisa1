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
            <li class="breadcrumb-item"><a href="{{url('/Parokia')}}">Manage Parish</a></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="tile">

                <h3 class="tile-title"> Parish to be Managed</h3>
                @include('includes.Response_Message')
                    @if(!$parishs->isEmpty())
                    <table  class="table table-borderless">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Parish Name</th>
                            <th></th>
                        </tr>

                        </thead>

                        <tbody>

                     @foreach($parishs as $key=>$parish)
                         <tr>
                             <td>{{$key+1}}</td>
                             <td class="text-capitalize">{{$parish->name}}</td>
                             <td>
                                 {{-- <a href="{{route('Parokia.edit',$parish->id)}}" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil fa-2x"></span></a> --}}
                                {{-- <a data-toggle="modal"  data-target="#delete{{$parish->id}}" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash fa-2x"></span></a>--}}

                           {{--      <div class="modal fade modal-lg" id="delete{{$parish->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Delete Parish</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div>
                                             <div class="modal-body d-flex mx-auto justify-content-center row">
                                                 <div class="col-md-12" style="color: black"><h4>Are sure you want to delete?</h4></div>


                                             </div>

                                             <div class="modal-footer mx-auto">
                                                 <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                                 <form action="{{route('Parokia.destroy',$parish->id)}}" method="post" name="delete">
                                                     @csrf
                                                     <input name="_method" type="hidden" value="DELETE">

                                                     <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Delete</button>
                                                 </form>
                                             </div>

                                         </div>
                                     </div>
                                 </div>--}}
                             </td>



                         </tr>
                        @endforeach

                        </tbody>

                    </table>
                        @else

                               <div class="alert alert-info">
                                   <h6>There is no any Parish at this time</h6>
                               </div>
                 @endif



            </div>

        </div>

     {{--   <div class="col-md-5">

            <div class="tile">

                <h3 class="tile-title">Add Parish</h3>

                <div class="tile-body">

                    <form class="form-horizontal" method="POST" action="{{route('Parokia.store')}}" id="section-form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="control-label col-md-3">Parish name&nbsp;<strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter Parish Name" name="parish" id="parish" required>
                            </div>

                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button id="submit" type="submit" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Parish</button>
                                </div>

                                <div class="col-md-4">
                                    <div class="pull-right"><p><strong style="color:red;">*</strong>&nbsp;&nbsp;Required</p></div>
                                </div>

                            </div>


                        </div>

                    </form>

                </div>



            </div>

        </div>--}}

    </div>

        <div class="col-md-2"></div>

    </div>


@endsection
