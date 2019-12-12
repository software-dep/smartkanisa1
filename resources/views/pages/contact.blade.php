@extends('layouts.app')


@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i>Contacts </h1>
        <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <li class="breadcrumb-item">Church Tree</li>
        <li class="breadcrumb-item"><a href="{{url('/contact')}}">Contact</a></li>
    </ul>
</div>
<contact-component></f-component>


<div class="col-md-2"></div>

</div>
@endsection