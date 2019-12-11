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

        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="tile-body">

                    <form method="POST" id="member-form">


              {{--personal details--}}
                        <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-12 h4">Personal details</div>
                        </div>
                        <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-4">
                                <label for="fname">Your Name&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="your" placeholder="Eg: Geofrey Lucas" value="">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="mname">Father Name&nbsp;<strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="baba" placeholder="Eg: Alex Lucas" value="">

                            </div>

                            <div class="form-group col-md-4">
                                <label for="lname">Mother Name&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="mama" placeholder="Eg: Joyce Dickson" value="">
                             <label for="mname">Confirmation&nbsp;<strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="kipaimara" name="kipaimara" placeholder="" value="">

                            </div>

                            <div class="form-group col-md-3">
                                <label for="lname">Confirm- No&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="no_kipaimara" name="no_kipaimara" placeholder="" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="lname">Parish Confirm&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="parokia_kipaimara" name="parokia_kipaimara" placeholder="" value="">
                            </div>


                 </div>


                            <div class="form-row" style=" padding:5px; margin:10px;">

                                <div class="form-group col-md-4">

                                    <label for="gender">Gender&nbsp; <strong style="color:red;">*</strong></label>

                                    <select id="gender" class="form-control" name="gender">
                                        <option value="" >--select gender--</option>
                                        <option value="Male" >Male</option>
                                        <option value="Female" >Female</option>
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="zone_id">Birth date&nbsp; <strong style="color:red;">*</strong></label>
                                    <input type="datetime-local" class="form-control" id="birthdate" placeholder="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="baptized">baptized&nbsp; <strong style="color:red;">*</strong></label>
                                    <select id="baptized" class="form-control" name="baptized">
                                        <option value="" >--select options below--</option>
                                        <option value="yes" >Yes</option>
                                        <option value="no" >No</option>
                                    </select>

                                </div>

                            </div>



                        </div>

                        {{--end personal details--}}



                        {{--Baptized details--}}
                        <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-12 h4">Baptized details</div>
                        </div>

                        <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">

                            <div class="form-group col-md-4">

                                <label for="region">Region&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="mji" name="mji" placeholder="e.g Mwanza" >


                            </div>

                            <div class="form-group col-md-4">

                                <label for="region">Baptized Date &nbsp; <strong style="color:red;">*</strong></label>
                                <input type="datetime-local" class="form-control" id="tarehe_kubatizwa" name="tarehe_kubatizwa" placeholder="">

                            </div>

                            <div class="form-group col-md-4">
                                <label for="baptized">Babtized No&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="no_ubatizo" placeholder="">
                            </div>


                            <div class="form-row" style=" ">

                                <div class="form-group col-md-4">

                                    <label for="region">Baptized Parish&nbsp; <strong style="color:red;">*</strong></label>
                                    <input type="text" class="form-control" id="parokia_ubatizo" name="parokia_ubatizo" placeholder="e.g Bugando" >


                                </div>

                                <div class="form-group col-md-4">

                                    <label for="region">Baptized Padre &nbsp; <strong style="color:red;">*</strong></label>
                                    <input type="text" class="form-control" id="padre_ubatizo" name="padre_ubatizo" placeholder="">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="baptized">Miz baptism&nbsp; <strong style="color:red;">*</strong></label>
                                    <input type="text" class="form-control" id="msimamizi_ubatizo" name="msimamizi_ubatizo" placeholder="">
                                </div>

                            </div>

                        </div>
                        {{--End of baptized details--}}



                        {{--KOMUNYO DETAILS--}}
                        <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-12 h4">Communion details</div>
                        </div>
                        <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-3">
                                <label for="komunyo_ya_kwanza">Communion&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="komunyo_ya_kwanza" placeholder="" name="komunyo_ya_kwanza" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="mname">Confirmation&nbsp;<strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="kipaimara" name="kipaimara" placeholder="" value="">

                            </div>

                            <div class="form-group col-md-3">
                                <label for="lname">Confirm- No&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="no_kipaimara" name="no_kipaimara" placeholder="" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="lname">Parish Confirm&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="parokia_kipaimara" name="parokia_kipaimara" placeholder="" value="">
                            </div>






                        </div>

                        {{--END KUMUNYO DETAILS--}}







                         {{--Married DETAILS--}}
                        <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-12 h4">Marriage details</div>
                        </div>
                        <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-3">
                                <label for="tarehe_ndoa">Marriage Date&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="datetime-local" class="form-control" id="tarehe_ndoa" placeholder="" name="tarehe_ndio" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="no_ndoa">Marriage No&nbsp;<strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="no_ndoa" name="no_ndoa" placeholder="" value="">

                            </div>

                            <div class="form-group col-md-3">
                                <label for="parokia_ndoa">Parish Marriage&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="parokia_ndoa" name="parokia_ndoa" placeholder="" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="family_name">Family name&nbsp; <strong style="color:red;">*</strong></label>
                                <select id="family_name" class="form-control" name="family_name">
                                    <option value="" >--select options below--</option>
                                    <option value="yes" >Yes</option>
                                    <option value="no" >No</option>
                                </select>
                            </div>






                        </div>

                        {{--END Married DETAILS--}}


                    </form>

                </div>

                <div class="tile-footer">



                    <div class="row">

                        <div class="col-md-5 col-md-offset-3">

                            <button id="submit" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Member</button>&nbsp;&nbsp;&nbsp;<a id="cancel" class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>

                        </div>

                        <div class="col-md-5">

                            <div class="pull-right"><p><strong style="color:red;">*</strong>&nbsp;&nbsp;Required</p></div>

                        </div>

                    </div>






                </div>

            </div>

        </div>

        <div class="col-md-2"></div>




    </div>


@endsection
