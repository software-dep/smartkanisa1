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



{{-- vue js component --}}
<matoleo-library-component></matoleo-library-component>
{{-- <div class="row">

 <div class='col-md-1'></div>
 <div class='col-md-10 tile'>

    <div class="tile">
    
       <div class='row'>
                  <div class='col-md-8 col-sm-8'><h4 style="margin-bottom:0px">Tarehe Ya Kumbukumbu</h4></div>
                    <div class="col-md-4 col-sm-4"><span class='pull-right'><a class="nav-link " title="click to add" data-toggle="modal" data-target="#add"><button class="btn btn-success" ><span class="fa fa-plus " ></span></button></a></>
                    </div>
        </div>
    @include('includes.Response_Message')

  
    <table class='table table-bordered'>
        @if(!$misa->isEmpty())
        <thead>
            <tr >
                <th>Date</th>
               
                <th><center>Matoleo</center></th>
              
            </tr>
        </thead>
      
        <tbody>
          @foreach ($misa as $m)
              <tr>
                 <td> {{date('d - m - Y',strtotime($m->date))}}</td>
            
              
              <td >
                  <div class='row'>
                      <div class="col-sm-1"></div>
                   <div class="col-sm-6"><a href="{{url('main_matoleo',$m->id)}}"><button class="btn btn-success">matoleo+shukrani &nbsp;<span class="fa fa-diamond"></span></button></a></div>
                 <div class="col-sm-4"><a href="{{url('other_matoleo',$m->id)}}"><button class="btn btn-info">Harambee &nbsp;<span class="fa fa-handshake-o "></span></button></a></div>
                <div class="col-sm-1"></div>
                </div>
                
            
            </td>
             
                </tr>
          @endforeach
        </tbody>
       
     
      

        @else
        <div class='alert alert-info'>
            <h6>There is No any record at this time</h6>
        
        </div>
      
        @endif


    </table>
    {{$misa->links()}} 
    
        <div class="tile-body">

            
    
     
        </div>
    
    
    
    </div>




    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Misa Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="user-form" action="{{route('matoleo.store')}}" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="" >
               

                                <div class="form-group row">
                                    <label for="title" class="col-md-2 control-label">Date</label>
                                    <div class="col-md-10"> <input type="date" data-date="dd/mm/yyyy" class="form-control" id="description" name="date" required></div>
                                </div>

         
                        
                            
                        
                            </div>
                        
                            <div class="tile-footer">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="submit" class="btn btn-primary" type="submit"><i
                                                                                class="fa fa-fw fa-lg fa-check-circle"></i>Save 
                                                                    </button>&nbsp;&nbsp;&nbsp;<a id="cancel" class="btn btn-secondary"
                                            href="#"><i
                                                                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pull-right">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                            </div>
                        </form>
              
                </div>
    
            </div>
        </div>
        </div
 </div>
 <div class='col-md-1'></div>

</div> --}}
@endsection