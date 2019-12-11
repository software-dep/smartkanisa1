<form  id="member-form">


    {{--personal details--}}
    <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
        <div class="form-group col-md-12 h4">Personal details</div>
    </div>
    <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
        <div class="form-group col-md-4">
            <label for="fname">Your Name: </label>
           <label class="text-uppercase text-muted">{{$member->name}}</label>
        </div>

        <div class="form-group col-md-4">
            <label for="mname">Father Name:</label>
            <label class="text-uppercase text-muted">{{$member->baba}}</label>

        </div>

        <div class="form-group col-md-4">
            <label for="lname">Mother Name: </label>
            <label class="text-uppercase text-muted">{{$member->mama}}</label>
        </div>


        <div class="form-row" style=" padding:5px; margin:10px;">

            <div class="form-group col-md-6">

                <label for="gender">Gender: </label>

                <label class="text-uppercase text-muted">{{$member->gender}}</label>

            </div>

            <div class="form-group col-md-6">
                <label for="zone_id">Birth date: </label>
                <label class="text-uppercase text-muted">{{date('d-m-Y',strtotime($member->tarehe_kuzaliwa))}}</label>
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
            <label for="region">Region: </label>
            <label class="text-uppercase text-muted">{{$member->mji}}</label>


        </div>

        <div class="form-group col-md-4">

            <label for="region">Baptized Date : </label>
            <label class="text-uppercase text-muted"> {{date('d-m-Y',strtotime($member->tarehe_kubatizwa))}}</label>

        </div>

        <div class="form-group col-md-4">
            <label for="baptized">Babtized No: </label>
            <label class="text-uppercase text-muted">{{$member->no_ubatizo}}</label>
        </div>


        <div class="form-row" style=" ">

            <div class="form-group col-md-4">

                <label for="region">Baptized Parish: </label>
                <label class="text-uppercase text-muted">{{$member->parokia_ubatizo}}</label>


            </div>

            <div class="form-group col-md-4">

                <label for="region">Baptized Padre : </label>
                <label class="text-uppercase text-muted">{{$member->padre_ubatizo}}</label>

            </div>

            <div class="form-group col-md-4">
                <label for="baptized">Miz baptism: </label>
                <label class="text-uppercase text-muted">{{$member->msimamizi_ubatizo}}</label>
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
            <label for="komunyo_ya_kwanza">Communion: </label>
            <label class="text-uppercase text-muted">{{$member->komunyo_ya_kwanza}}</label>
        </div>

        <div class="form-group col-md-3">
            <label for="mname">Confirmation:</label>
            <label class="text-uppercase text-muted">{{$member->kipaimara}}</label>

        </div>

        <div class="form-group col-md-3">
            <label for="lname">Confirm- No: </label>
            <label class="text-uppercase text-muted">{{$member->no_kipaimara}}</label>
        </div>

        <div class="form-group col-md-3">
            <label for="lname">Parish Confirm: </label>
            <label class="text-uppercase text-muted">{{$member->parokia_kipaimara}}</label>
        </div>






    </div>

    {{--END KUMUNYO DETAILS--}}







    {{--Married DETAILS--}}
    <div class="form-row" style="border-bottom:1px solid #E5E5E5; padding:0px;  border-radius:10px;margin:10px;">
        <div class="form-group col-md-12 h4">Marriage details</div>
    </div>
    <div class="form-row" style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
        <div class="form-group col-md-3">
            <label for="tarehe_ndoa">Marriage Date: </label>
            <label class="text-uppercase text-muted">    {{date('d-m-Y',strtotime($member->tarehe_ndoa))}}</label>
        </div>

        <div class="form-group col-md-3">
            <label for="no_ndoa">Marriage No:</label>
            <label class="text-uppercase text-muted">{{$member->no_ndoa}}</label>

        </div>

        <div class="form-group col-md-3">
            <label for="parokia_ndoa">Parish Marriage: </label>
            <label class="text-uppercase text-muted">{{$member->parokia_ndoa}}</label>
        </div>

        <div class="form-group col-md-3">
            <label for="family_name">Family name: </label>
            <label class="text-uppercase text-muted">{{$member->family->name}}</label>
        </div>






    </div>

    {{--END Married DETAILS--}}


</form>