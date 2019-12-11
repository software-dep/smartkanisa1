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

            <div class="col-md-8">
                    <div class="tile">
                            <h3 class="tile-title">Choose  Report</h3>
                         <table class="table table-borderless">
                             <tbody>
                                    @if(isset($members))
                            @foreach($members as $member )
                                 <tr>
                                             
                                 <td class='lead links-1'><span style="color:blue" class='fa fa-angle-right'></span> <a href="{{route('report',$member->id)}}">{{$member->name}}</a> </td>
                                                
                                 </tr>
                            @endforeach
                            @endif
                             </tbody>

                         </table>
                       
                    </div>
             </div>

      

    <div class="col-md-2"></div>

    </div>


@endsection

