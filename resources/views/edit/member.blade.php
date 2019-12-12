@extends('layouts.app') 
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i>Member </h1>
        <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
        <li class="breadcrumb-item">Member</li>
        <li class="breadcrumb-item"><a href="{{url('/Member')}}">Edit Member</a></li>
    </ul>
</div>
<div class="row">



    <div class="col-md-8 offset-md-2">

        <div class="tile">
            <h3 class="tile-title">Edit Member</h3>
            <div class="tile-body">
                <form class="form-horizontal" method="POST" action="{{route('Member.update',$member->id)}}" id="section-form">
                    @csrf @method('PUT')
                  {{--personal details--}}
                <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-12 h4">Personal details</div>
                </div>
                <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-4">
                        <label for="name">Your Name&nbsp; <strong style="color:red;">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$member->name}}">
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="name">Father Name&nbsp;<strong style="color:red;">*</strong></label>
                    <input type="text" class="form-control" id="baba" name="baba" value='{{$member->baba}}'>
                
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="name">Mother Name&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="text" class="form-control" id="mama" name="mama" value='{{$member->mama}}'>
                    </div>
                
                
                    <div class="form-row" style=" padding:5px; margin:10px;">
                
                        <div class="form-group col-md-3">
                
                            <label for="gender">Gender&nbsp; <strong style="color:red;">*</strong></label>
                
                            <select id="gender" class="form-control" name="gender">
                                                        <option value='{{$member->gender}}' >{{$member->gender}}</option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female" >Female</option>
                                                    </select>
                
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="">Birth date&nbsp; <strong style="color:red;">*</strong></label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value='{{$member->tarehe_kuzaliwa}}'>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for=""> Place&nbsp; <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" id="mahali" name="mahali" value='{{$member->mahali}}'>
                        </div>
                
                        <div class="form-group col-md-3">
                            <label for="baptized">Number&nbsp; <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control"  name="number" value='{{$member->number}}'>
                
                        </div>
                
                    </div>
                
                
                
                </div>
                
                {{--end personal details--}} {{--Baptized details--}}
                <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-12 h4">Baptized details</div>
                </div>
                
                <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                
                    <div class="form-group col-md-4">
                
                        <label for="region">Region&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="text" class="form-control" id="mji" name="mji" value='{{$member->mji}}'>
                
                
                    </div>
                
                    <div class="form-group col-md-4">
                
                        <label for="region">Baptized Date &nbsp; <strong style="color:red;">*</strong></label>
                        <input type="date" class="form-control" id="tarehe_kubatizwa" name="tarehe_kubatizwa" value='{{$member->tarehe_kubatizwa}}'>
                
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="baptized">Babtized No&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="number" class="form-control" id="no_ubatizo" name="no_ubatizo" value='{{$member->no_ubatizo}}'>
                    </div>
                
                
                    <div class="form-row" style=" ">
                
                        <div class="form-group col-md-4">
                
                            <label for="region">Baptized Parish&nbsp; <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" id="parokia_ubatizo" name="parokia_ubatizo" value='{{$member->parokia_ubatizo}}'>
                
                
                        </div>
                
                        <div class="form-group col-md-4">
                
                            <label for="region">Baptized Padre &nbsp; <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" id="padre_ubatizo" name="padre_ubatizo" value='{{$member->padre_ubatizo}}'>
                
                        </div>
                
                        <div class="form-group col-md-4">
                            <label for="baptized">Miz baptism&nbsp; <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control" id="msimamizi_ubatizo" name="msimamizi_ubatizo" value='{{$member->msimamizi_ubatizo}}'>
                        </div>
                
                    </div>
                
                </div>
                {{--End of baptized details--}} {{--KOMUNYO DETAILS--}}
                <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-12 h4">Communion details</div>
                </div>
                <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-3">
                        <label for="komunyo_ya_kwanza">Communion&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="text" class="form-control" id="komunyo_ya_kwanza" placeholder="" name="komunyo_ya_kwanza" value='{{$member->komunyo_ya_kwanza}}'>
                    </div>
                
                    <div class="form-group col-md-3">
                        <label for="mname">Confirmation&nbsp;<strong style="color:red;">*</strong></label>
                        <input type="text" class="form-control" id="kipaimara" name="kipaimara" value='{{$member->kipaimara}}'>
                
                    </div>
                
                    <div class="form-group col-md-3">
                        <label for="lname">Confirm- No&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="number" class="form-control" id="no_kipaimara" name="no_kipaimara" value='{{$member->no_kipaimara}}'>
                    </div>
                
                    <div class="form-group col-md-3">
                        <label for="lname">Parish Confirm&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="text" class="form-control" id="parokia_kipaimara" name="parokia_kipaimara" value='{{$member->parokia_kipaimara}}'>
                    </div>
                
                
                
                
                
                
                </div>
                
                {{--END KUMUNYO DETAILS--}} {{--Married DETAILS--}}
                <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-12 h4">Marriage details</div>
                </div>
                <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                    <div class="form-group col-md-3">
                        <label for="tarehe_ndoa">Marriage Date&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="date" class="form-control" id="tarehe_ndoa" value='{{$member->tarehe_ndoa}}' name="tarehe_ndoa">
                    </div>
                
                    <div class="form-group col-md-3">
                        <label for="no_ndoa">Marriage No&nbsp;<strong style="color:red;">*</strong></label>
                        <input type="number" class="form-control" id="no_ndoa" name="no_ndoa" value='{{$member->no_ndoa}}'>
                
                    </div>
                
                    <div class="form-group col-md-3">
                        <label for="parokia_ndoa">Parish Marriage&nbsp; <strong style="color:red;">*</strong></label>
                        <input type="text" class="form-control" id="parokia_ndoa" name="parokia_ndoa" value='{{$member->parokia_ndoa}}'>
                    </div>
                
                    <div class="form-group col-md-3">
                        <label for="family_name">Family name&nbsp; <strong style="color:red;">*</strong></label>
                        <select id="family_name" class="form-control" name="familia_id">
                        <option value='{{$member->familia_id}}' >{{$member->family->name}}</option>
                                                     @if(!$family->isEmpty())
                                                        @foreach($family as $fam)
                                                            <option value="{{$fam->id}}" >{{$fam->name}}</option>
                                                        @endforeach
                
                
                                                         @else
                                                        <option  >No any family at this time</option>
                                                         @endif
                                                </select>
                    </div>
                
                
                
                
                
                
                </div>
                
                {{--END Married DETAILS--}}
                
             

                   
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Member</button>
                            </div>

                            <div class="col-md-4">
                                <div class="pull-right">
                                    <p><strong style="color:red;">*</strong>&nbsp;&nbsp;Required</p>
                                </div>
                            </div>

                        </div>


                    </div>

                </form>

            </div>



        </div>

    </div>

</div>

<div class="col-md-2"></div>

</div>
@endsection