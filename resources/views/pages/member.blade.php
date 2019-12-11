@extends('layouts.app')


@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i>Church Members </h1>
            <p>welcome {{Auth::user()->fname}} &nbsp; {{Auth::user()->lname}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item">Church Members</li>
            <li class="breadcrumb-item"><a href="{{url('/Member')}}">Add Church Member</a></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-md-1"></div>
        <div class="col-md-10">
            <member-component></member-component>
            {{-- @include('includes.Response_Message')

            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="tile-body"> --}}


     
                  
                {{-- <form method='POST' action='{{url('/get_family')}}' enctype="multipart/form-data">
                      {{csrf_field()}}
                    <div class='form-row' style=" padding:0px; border-radius:10px;margin:10px;">
                          <div class="col-md-6 h4">Personal details</div>
                            <div class='col-md-4'>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Search for family">
                            </div>
                            
                            <button class='btn btn-secondary col-md-1'>Go</button>
                      </div>

                </form>

                    <form method="POST" action="{{route('Member.store')}}"  enctype="multipart/form-data">
                        {{csrf_field()}} --}}


                        {{--personal details--}}
{{--                       
                        <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                           
                            @if(isset($family))
                            <div class="form-group col-md-3">
                                <label for="family_name">Family name&nbsp;<strong style="color:red;">*</strong></label>
                                <select id="family_name" class="form-control" name="familia_id">
                                                                                            <option  >--chagua--</option>
                                                                                        
                                                                                                @foreach($family as $fam)
                                <option value="{{$fam->id}}" >{{$fam->name}},wa Jumuiya:{{$fam->jumuiya->name}}</option>
                                                                                                @endforeach
                                                                                                
                                                                                        </select>
                            </div>
                            @else
                            <div class="form-group col-md-3">
                                    <label for="family_name">Family name&nbsp;<strong style="color:red;">*</strong></label>
                                    <input id="family_name" class="form-control" name="familia_id" placeholder="search family" readonly></input>
                                </div>
                            @endif
                           
                            <div class="form-group col-md-3">
                                <label for="name">Your Name&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Geofrey Lucas" >
                            </div>

                            <div class="form-group col-md-3">
                                <label for="name">Father Name&nbsp;<strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="baba" name="baba"  placeholder="Eg: Alex Lucas" >

                            </div>

                            <div class="form-group col-md-3">
                                <label for="name">Mother Name&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="mama" name="mama" placeholder="Eg: Joyce Dickson" >
                            </div>

                          


                            <div class="form-row" style=" padding:5px; margin:10px;">

                                <div class="form-group col-md-3">

                                    <label for="gender">Gender&nbsp; <strong style="color:red;">*</strong></label>

                                    <select id="gender" class="form-control" name="gender">
                                        <option  >--chagua--</option>
                                        <option value="Male"  >Male</option>
                                        <option value="Female" >Female</option>
                                    </select>

                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Birth date&nbsp; <strong style="color:red;">*</strong></label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for=""> Place&nbsp; <strong style="color:red;">*</strong></label>
                                    <input type="text" class="form-control" id="mahali" name="mahali" placeholder="e.g Mwanza">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="baptized">baptized&nbsp; <strong style="color:red;">*</strong></label>
                                    <select id="baptized" class="form-control" id='baptized' onChange= "bcheck();" name="baptized">
                                        <option value="no" >--chagua--</option>
                                        <option value="yes">Yes</option>
                                        <option value="no" >No</option>
                                    </select>

                                </div>

                            </div>



                        </div>

                      

                        {{--end personal details--}}

                {{-- <div id='bcontrol'> --}}
{{-- Baptized details --}} 
{{-- <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
    <div class="form-group col-md-12 h4">Baptized details</div>
</div>

<div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">

    <div class="form-group col-md-4">

        <label for="region">Region</label>
        <input type="text" class="form-control" id="mji" name="mji" placeholder="e.g Mwanza">


    </div>

    <div class="form-group col-md-4">

        <label for="region">Baptized Date </label>
        <input type="date" class="form-control" id="tarehe_kubatizwa" name="tarehe_kubatizwa" placeholder="">

    </div>

    <div class="form-group col-md-4">
        <label for="baptized">Babtized No</label>
        <input type="number" class="form-control" id="no_ubatizo" name="no_ubatizo" placeholder="">
    </div>


    <div class="form-row" style=" ">

        <div class="form-group col-md-3">

            <label for="region">Baptized Parish</label>
            <input type="text" class="form-control" id="parokia_ubatizo" name="parokia_ubatizo" placeholder="e.g Bugando">


        </div>

        <div class="form-group col-md-3">

            <label for="region">Baptized Padre </label>
            <input type="text" class="form-control" id="padre_ubatizo" name="padre_ubatizo" placeholder="">

        </div>

        <div class="form-group col-md-3">
            <label for="baptized">Miz baptism</label>
            <input type="text" class="form-control" id="msimamizi_ubatizo" name="msimamizi_ubatizo" placeholder="">
        </div>

        <div class="form-group col-md-3">
                        <label for="baptized">Communion&nbsp; <strong style="color:red;">*</strong></label>
                        <select  class="form-control" id='communion' onChange="Ccheck();" name="communion">
                                                            <option value="no" >--chagua--</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no" >No</option>
                                                        </select>
                    
                    </div>

    </div>

</div> --}}
{{--End of baptized details--}} 
{{--KOMUNYO DETAILS--}}
{{-- <div id='c_control'>
<div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
    <div class="form-group col-md-12 h4">Communion details</div>
</div>
<div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
    <div class="form-group col-md-3">
        <label for="komunyo_ya_kwanza">Communion</label>
        <input type="text" class="form-control" id="komunyo_ya_kwanza" placeholder="" name="komunyo_ya_kwanza">
    </div>

    <div class="form-group col-md-3">
        <label for="mname">Confirmation</label>
        <input type="text" class="form-control" id="kipaimara" name="kipaimara" placeholder="">

    </div>

    <div class="form-group col-md-3">
        <label for="lname">Confirm- No</label>
        <input type="number" class="form-control" id="no_kipaimara" name="no_kipaimara" placeholder="">
    </div>

    <div class="form-group col-md-3">
        <label for="lname">Parish Confirm</label>
        <input type="text" class="form-control" id="parokia_kipaimara" name="parokia_kipaimara" placeholder="">
    </div>






</div> --}}

{{--END KUMUNYO DETAILS--}} {{--Married DETAILS--}}
{{-- <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
    <div class="form-group col-md-12 h4">Marriage details</div>
</div>
<div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
    <div class="form-group col-md-4">
        <label for="tarehe_ndoa">Marriage Date</label>
        <input type="date" class="form-control" id="tarehe_ndoa" placeholder="" name="tarehe_ndoa">
    </div>

    <div class="form-group col-md-4">
        <label for="no_ndoa">Marriage No</label>
        <input type="number" class="form-control" id="no_ndoa" name="no_ndoa" placeholder="">

    </div>

    <div class="form-group col-md-4">
        <label for="parokia_ndoa">Parish Marriage</label>
        <input type="text" class="form-control" id="parokia_ndoa" name="parokia_ndoa" placeholder="">
    </div>








</div> --}}

{{--END Married DETAILS--}}
            {{-- </div>
            </div>

                        <div class="tile-footer">
                            <div class="row">

                                <div class="col-md-5 col-md-offset-3">
                                    <button id="submit" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Member</button>&nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="col-md-5">
                                    <div class="pull-right"><p><strong style="color:red;">*</strong>&nbsp;&nbsp;Required</p></div>
                                </div>
                            </div>

                        </div>


                    </form>

                </div>


            </div>
            --}}

        </div>

        <div class="col-md-1"></div>



    </div>

 


@endsection
