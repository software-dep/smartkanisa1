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
            <li class="breadcrumb-item">Report</li>
            <li class="breadcrumb-item"><a href="{{url('/Donations_report')}}">Donation Report</a></li>
        </ul>
    </div>
    <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8 tile">


                <table class='table table-borderless'>
                    <thead>
                        <tr>
                                <th class='h2'>Report ya  @include('includes.mchango') mchango wa {{$members->name}} </th>
                        </tr>
                        <tr>
                                <td> <span class='fa fa-star' style='color:blue'></span> &nbsp;Idadi  ya @include('includes.mchango') <span class='text-muted'>@include('includes.idadi')</span></td>
                        </tr>
                        <tr>
                                <td> <span class='fa fa-star' style='color:blue'></span> &nbsp;Kiwango kidogo cha Mchango kwa @include('includes.mchango') ni 
                                   
                                    @if($members->amount==0)
                                    0
                                    @else
                                    <span class='text-muted'>{{$members->amount}}</span>
                                    @endif
                                </td>
                        </tr>

                        <tr>
                                <td> <span class='fa fa-star' style='color:blue'></span> &nbsp;Makadirio ya makusanyo ni 
                                    @foreach($members->members as $key=>$don)
                                   @if($loop->first)
                                        <span class='text-muted'> @include('includes.calculations')</span>
                                         @else
                                         <div style='display:none'> {{$don->pivot->amount}}</div>
                                   @endif
                                     @endforeach
                                </td>
                        </tr>

                        <tr>
                                <td> <span class='fa fa-star' style='color:blue'></span> &nbsp;Jumla ya makusanyo ni 
                                    @foreach($members->members as $key=>$don)
                                   @if($loop->first)
                                        <span class='text-muted'> @include('includes.makusanyo')</span>
                                         @else
                                         <div style='display:none'> {{$don->pivot->amount}}</div>
                                   @endif
                                     @endforeach
                                </td>
                        </tr>

                 <tr><td>
                    <a href="{{ route('reportpdf',$id) }}">Download PDF</a></td></tr>
                    </thead>
                </table>
                <h5 class='ml-2'>List ya  @include('includes.mchango') katika mchango wa {{$members->name}} </h5>
                    <div class="tile">
                        
                            <h6></h6>
                              @if(isset($members))
                         <table  class="table table-bordered">
                             <thead>
                             <tr>
                                 <th>No.</th>
                                 <th>Name</th>
                
        
                                 <th>Paid</th>
                                 <th>Remained</th>
                             </tr>
     
                             </thead>
     
                             <tbody>
                            <?php $count =1; ?>
                             @foreach($members->members as $key=>$don )
                                 <tr>
                                     <td>{{$count++}}</td>
                                     <td class="text-capitalize">{{$don->name}}</td>
  
                                     <td class="text-capitalize">{{$don->pivot->amount}}</td>
                                     <td class="text-capitalize">
                                        @if ( ($members->amount - $don->pivot->amount) == 0)
                                            <span class="fa fa-check fa-2x ml-1" style="color: #1b4b72"></span>
     
                                            @elseif(($don->pivot->amount - $members->amount) > 0)
                                             <span class="fa fa-handshake-o fa-2x ml-1" style="color: #1b4b72"></span>
                                            @else
                                             <span class="text-danger">{{$members->amount - $don->pivot->amount}}</span>
                                         @endif
                                     </td>
     
     
                                 </tr>
                             @endforeach
     
     
                             </tbody>
     
                         </table>
                       {{--  {{$michango->links()}}--}}
                         @else
                         <div class="alert alert-heading">
                             <h6>Empty list</h6>
                         </div>
                     @endif
     
     
                       
                    </div>
             </div>

      

    <div class="col-md-2"></div>

    </div>


@endsection

