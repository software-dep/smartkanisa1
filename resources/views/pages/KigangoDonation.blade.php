@extends('layouts.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-money"></i>Donations </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Donation </li>
            <li class="breadcrumb-item"><a href="{{url('/Kigango-Donation')}}">Kigango Donation</a></li>
        </ul>
    </div>

    {{-- vue component --}}
    <kigango-donation-component></kigango-donation-component>

@endsection

