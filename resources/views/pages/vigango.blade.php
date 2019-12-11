@extends('layouts.app')

@section('css')

@endsection


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
            <li class="breadcrumb-item"><a href="{{url('/Vigango')}}">Manage Outstation</a></li>
        </ul>
    </div>



      {{-- {{dd(Auth::user()->user_type)}} --}}
    {{-- {!! json_encode(Auth::user()->user_type) !!}  --}}
    {{-- :item="'{!! json_encode($myDataString) !!}'" --}}
    {{-- '{!! json_encode($myDataString) !!}' --}}



    @php
    $user_info = Auth::user();
    @endphp
    <vigango-component :user_info="{{ json_encode($user_info) }}"></vigango-component>


@endsection

