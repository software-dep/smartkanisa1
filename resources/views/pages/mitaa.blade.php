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
            <li class="breadcrumb-item"><a href="{{url('/Mitaa')}}">Manage Street</a></li>
        </ul>
    </div>

    @php
    $user_info = Auth::user();
    @endphp
    
    


<mitaa-component :user_info="{{ json_encode($user_info) }}"></mitaa-component>
    

@endsection

