@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> Home</h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="">Home</a></li>
        </ul>
    </div>

@can('isParoko')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">people</i>
                </div>
                <p class="card-category">Members</p>
                <h3 class="card-title">{{$count_member}}
                   
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">expand_more</i>
                    <a href="{{Route('Member.create')}}"> More </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">Families</p>
            <h3 class="card-title">{{$count_family}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">expand_more</i>
                    <a href="{{route('Family.index')}}">More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">explore</i>
                </div>
                <p class="card-category">Jumuiya</p>
                <h3 class="card-title">{{$count_jumuiya}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">expand_more</i> 
                    <a href="{{route('Jumuiya.index')}}">More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">view_module</i>
                </div>
                <p class="card-category">Mitaa</p>
                <h3 class="card-title">{{$count_mtaa}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">expand_more</i> 
                    <a href="{{route('Mitaa.index')}}">More</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endcan

{{-- <div class=" tinted-image" >
   <div  class="pt-4" style="background: rgba(0, 0, 0, 0.3);" >
 <h1 class="tile-title" style="text-align:center; color:#5d1a31; padding-top: 3px">Bugando Parish (BP)</h1>
         <h3 class="tile-title" style="text-align:center; #00cae3 "> Management System</h3>
<img >

   </div>
</div> --}}
<div class="row">
    <div class="col-md-6">
 <div class="card">
    <div class="card-header card-header-success">
        <h4 class="card-title">VIGANGO </h4>
        <p class="card-category">List of outstations  </p>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead class="text-success">
              
                <th>Name</th>
                {{-- <th>Members</th> --}}
            </thead>
            <tbody>
                @foreach($vigango as $key=>$kigango)
                <tr>
             
                <td class="text-capitalize">{{$kigango->name}}</td>
                    {{-- <td>$36,738</td> --}}
                   
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</div>
    </div>

    <div class="col-md-6">
 <div class="card">
    <div class="card-header card-header-danger">
        <h4 class="card-title">MICHANGO </h4>
        <p class="card-category">List of recent donations </p>
    </div>
    <div class="card-body table-responsive">
        @if(!$michango->isEmpty())

          <table class="table table-hover">
            <thead class="text-danger">
                <th>No</th>
                <th>Name</th>
                <th>Target</th>
                <th>Amount</th>
                
            </thead>
            <tbody>
                @foreach($michango as $key=>$don)
                <tr>
                <td>{{$key+1}}</td>
                <td class="text-capitalize">{{$don->name}}</td>
                <td>{{$don->donation_type}}</td>
                <td>{{$don->amount}}</td>
                    
        
                </tr>
              @endforeach
            </tbody>
        </table>

      @else 
        <div class="alert alert-info">
            <h6>There is no any Donation at this time</h6>
        </div>
        @endif
     
    </div>
</div>
    </div>

</div>

  
@endsection
