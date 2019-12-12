@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i>Member Report </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Report</li>
            <li class="breadcrumb-item"><a href="{{url('/member_report')}}">Member Report</a></li>
        </ul>
    </div>

   <member_report-component></member_report-component>
 


@endsection

