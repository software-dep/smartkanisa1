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
        <li class="breadcrumb-item">Matoleo Report</li>
        <li class="breadcrumb-item"><a href="{{url('/matoleo_report')}}"> Matoleo</a></li>
    </ul>
</div>
    @include('includes.Response_Message')

<div class="row">


    <div class='col-md-1'></div>
   

  <div class ='col-md-10 tile'>
     <div class="tile-body">
    
        <div style="border:1px solid #E5E5E5; padding:5px;  border-radius:5px;margin:10px;padding:10px;">
    
            <div class="row">
    
                <div class="col-sm-8">
                    <h3>Filter By:</h3>
                </div>
                <div class="col-sm-2">
    
                </div>
    
            </div>
 
        <div class="row">
            <div class="col-sm-12">
                <form class="row" action='{{url("matoleo_search")}}'>
                    {{csrf_field()}}
                    <div class="form-group col-sm-3">
                        <label class="control-label" for="section_id">From&nbsp;<strong style="color:red;">*</strong></label>
                        <input type="date" name="from"  @if(isset($from)) value='{{$from}}' @endif class="form-control datepicker-here" data-language='en' data-position='bottom center' data-min-view="months"
                            placeholder="Eg: 01/01/2019">
                
                    </div>
                
                    <div class="form-group col-sm-3">
                        <label class="control-label" for="month">To&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="date" name="to" @if(isset($to)) value='{{$to}}' @endif   class="form-control datepicker-here" data-language='en' data-position='bottom center' data-min-view="months"
                            placeholder="Eg: 01/03/2019">
                
                    </div>

                    <div class="form-group col-sm-3">
                        <label class="control-label" for="month">Except</label>
                        <input type="date" name="except" class="form-control datepicker-here" data-language='en' data-position='bottom center' data-min-view="months"
                            placeholder="Eg: 01/03/2019">
                    
                    </div>
                
                    <div class="form-group col-sm-3 align-self-end">
                        <input type="submit" class="form-control btn btn-primary btn-block" id="report_btn" name="report_btn" value="Generate Report"
                        />
                
                    </div>
                </form>
               
            </div>
           
        </div>
        <div class="">
        
            @if(isset($matoleo))
            <form class='row ' method='POST' action="{{url('pdfgenerate')}}">
                {{csrf_field() }}
                <input type="hidden" name="to" value='{{$to}}'>
                <input type="hidden" name="from" value='{{$from}}'>
                <input type="hidden" name="except" value='{{$except}}'>
                <div class="col-md-9"></div>
                <div class="form-group col-sm-3">
                    <button class="btn btn-success align-self-end btn-block" > Download Pdf</button>
                </div>
                {{-- <div class="col-md-3"></div> --}}
            </form>
            @endif
        </div>
    
        
    
        </div>


       
       @include('includes.michangoreport')
    
    </div>




  </div>
    
    <div class='col-md-1'></div>

</div>
@endsection