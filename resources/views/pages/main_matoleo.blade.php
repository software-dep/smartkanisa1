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
@include('includes.Response_Message')

<div class="row">
   

  
    <div class='col-md-5'>

        <div class="tile">
            <h3 class="tile-title"> With Church Members</h3>
            <div class="tile-body">


             {{-- search functionality --}}
            <form method='POST' action="{{url('Member-search')}}">
                    {{csrf_field() }}
                    <div class="form-row" >  
                    <input type="hidden" value='{{$misa_id}}' name='misa_id'>
                        <label class="control-label col-md-4">Search User&nbsp; <strong style="color:red;">*</strong></label>           
                        <div class="col-md-6">
                            <input id="section_name" class="form-control" type="text" placeholder="Enter userNo" name="member" required>
                        </div>            
                        <div class="col-md-2">
                            <button id="submit" type="submit" class="btn btn-primary" style=""><i class="fa  fa-search"></i></button>
                        </div>            
                    </div>
                </form>

           


                {{-- user attach --}}
                @if(isset($members))

            <form method="POST" id="user-form" action="{{route('Matoleo_add.store')}}" enctype="multipart/form-data"> 
                {{csrf_field()}}   
                <input type="hidden" name='misa_id' value='{{$misa_id}}'>    
                 <div style="border:1px solid #E5E5E5; padding:5px; border-radius:10px;margin:10px;">
                    <div class="" > 

                    <div class="form-group row">
                        <label for="Amount" class=col-md-2>Member</label>
                        <div class='form-group col-md-10'>
                            <select class="form-control" name="member_id" required>
                                             <option style="color: black">--Choose Member--- </option>                                            
                                                          @foreach($members as $member )
                                                         <option style="color: black" value="{{$member->id}}">{{$member->name}}: Kigango cha {{$member->family->jumuiya->mtaa->kigango->name}} </option>
                                                         @endforeach
                                                      
                                            
                                             </select>
                        </div>
                    </div>
                   
                   
                 </div>
                
                        <div class="form-group row ">
                            <label class='col-md-2' for="Amount">Sadaka</label>
                         <div class=' col-md-10'>
                            <input class="form-control" type="number" name="sadaka" value='Enter Amount Numerical' required>
                        </div>
                        </div>   
                                               
                        <div class="form-group row">
                            <label for="title" class="col-md-2 control-label">Shukrani</label>
                            <div class="col-md-10"> <input type="number" class="form-control" id="shukrani" name="shukrani" required></div>
                        </div> 
                      
                    
                  
                   
                </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="submit" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Matoleo</button>&nbsp;&nbsp;&nbsp;
                                <a id="cancel" class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>

                            <div class="col-md-4">

                                <div class="pull-right">
                                    <p><strong style="color:red;">*</strong>Required</p>
                                </div>

                            </div>

                        </div>

                    </div>

                </form>

@endif
            </div>



        </div>
    </div>

{{-- UNKNOWN SOURCE --}}
    <div class='col-md-6'>   
        <div class="tile">
        
            <div class='row'>
                <div class='col-md-8'>
                    <h3 class="tile-title">Michango General</h3><h6>(sadaka na shukrani)</h6>
                  
                    
                </div>
                <div class="col-md-4">
                    <h6 class='pull-right'><a class="nav-link " title="click to add" data-toggle="modal" data-target="#add"><button class="btn btn-success" ><span class="fa fa-plus " ></span></button></a></h6>
                </div>
            </div>
            
            <table class="table table-bordered">
                @if(!$matoleo->isEmpty())
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Kigango</th>
                        <th>Sadaka</th>
                        <th>Shukrani</th>                      
                        <th>Action</th>                      
                    </tr>

                </thead>
                <tbody>
                   
                    @foreach ($matoleo as $mato)
                        <tr>
                      <td>{{$mato->matoleo->date}}</td>
                        <td>{{$mato->kigango}}</td>
                        {{-- <td>ya:{{$mato->misa}}</td> --}}
                        <td>{{$mato->sadaka}}</td>
                        <td>{{$mato->shukrani}}</td>
                        <td>
                            {{-- <a data-toggle="modal" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a> --}}
                            <a data-toggle="modal" data-target="#delete{{$mato->id}}" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash"></span></a>
                        </td>

                        <div class="modal fade modal-lg" id="delete{{$mato->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$mato->kigango}} &nbsp; {{$mato->date}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                    </div>
                                    <div class="modal-body d-flex mx-auto justify-content-center row">
                                        <div class="col-md-12" style="color: black">
                                            <h4>Are sure you want to delete?</h4>
                                            {{-- {{$mato->id}} --}}
                            
                                        </div>
                        
                        
                                    </div>
                        
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                        <form action="{{route('wageni.destroy',$mato->id)}}" method="post" name="delete">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                        
                                            <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Delete</button>
                                        </form>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                      
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
            <div class="tile-body">
    
           
    
    
            </div>
    {{-- add data --}}
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
                    <form method="POST" id="user-form" action="{{route('wageni.store')}}" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <input type="hidden" name='misa_id' value='{{$misa_id}}'>
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
                                <label for="Amount" class='col-md-2'>Sadaka</label>
                                <div class='col-md-10'>
                                    <input class="form-control" type="text" name="sadaka">
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="Amount" class='col-md-2'>Shukrani</label>
                                <div class='col-md-10'>
                                    <input class="form-control" type="text" name="shukrani">
                                </div>
                            </div>
                    
                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="submit" class="btn btn-primary" type="submit"><i
                                                                                                        class="fa fa-fw fa-lg fa-check-circle"></i>Add
                                                                                            </button>
                    
                                </div>
                    
                                <div class="col-md-4">
                    
                                    <div class="pull-right">
                                        <p></p>
                                    </div>
                    
                                </div>
                    
                            </div>
                    
                        </div>
                    
                    </form>
    
        </div>
    
    </div>
    </div>
    </div> </div>
    
    
        </div>
    </div>
    <div class='col-md-1'></div>

</div>
@endsection