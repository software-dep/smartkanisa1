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
            <li class="breadcrumb-item"><a href="{{url('/User')}}"> System users</a></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">

            <div class="tile">

                <h3 class="tile-title">Add New User</h3>
                @include('includes.Response_Message')

                <div class="tile-body">

                    <form method="POST" id="user-form"  action="{{route('User.store')}}" enctype="multipart/form-data">
                       {{csrf_field()  }}
                        <div class="form-row"
                             style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">

                            <div class="form-group col-md-5">

                                <label for="fname">First Name&nbsp; <strong style="color:red;">*</strong></label>

                                <input type="text" class="form-control" id="fname" name="fname"
                                       placeholder="Eg: Geofrey">

                            </div>

                            <div class="col-md-2"></div>

                            <div class="form-group col-md-5">
                                <label for="lname">Last Name&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Eg: Bundala">

                            </div>

                        </div>


                        <div class="form-row"
                             style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">

                            <div class="form-group col-md-5">
                                <label for="phone">Phone Number&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                       placeholder="Eg: 0746401539">

                            </div>

                            <div class="col-md-2"></div>
                            <div class="form-group col-md-5">
                                <label for="email">Email Address&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Eg: bundalageofrey2@gmail.com">

                            </div>

                        </div>

                        <div class="form-row"
                             style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">
                            <div class="form-group col-md-5">
                                <label for="password">Password&nbsp; <strong style="color:red;">*</strong></label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Enter user's password">

                            </div>

                            <div class="col-md-2"></div>

                            <div class="form-group col-md-5">

                                <label for="cmfm_pwd">Confirm password&nbsp; <strong
                                            style="color:red;">*</strong></label>

                                <input type="password" class="form-control" id="cmfm_pwd" name="cmfm_pwd"
                                       placeholder="Confirm password">

                            </div>

                        </div>

                        <div class="form-row"
                             style="border:1px solid #E5E5E5; padding:5px;  border-radius:10px;margin:10px;">

                            <div class="form-group col-md-5">
                                <label for="role_id">Select Role&nbsp; <strong style="color:red;">*</strong></label>
                                <select id="role_id" name="user_type" class="form-control" data-live-search="true">
                                    <option value="dataentry">Data Entry</option>
                                    <option value="admin">Admin</option>
                                </select>

                            </div>

                            <div class="col-md-2"></div>

                            <div class="form-group col-md-5">

                                <label for="profile">Profile Picture</label>

                                <input type="file" class="form-control" id="profile" name="profile">

                            </div>

                            <div class="form-group col-md-5"></div>

                            <div class="col-md-2"></div>

                            <div class="form-group col-md-5">
                                   <div><h6 class="text-muted">image size 180*180</h6></div>

                            </div>

                        </div>


                        <div class="tile-footer">

                            <div class="row">

                                <div class="col-md-6 col-md-offset-3">

                                    <button id="submit" class="btn btn-primary" type="submit"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Save User
                                    </button>&nbsp;&nbsp;&nbsp;<a id="cancel" class="btn btn-secondary" href="#"><i
                                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>

                                </div>

                                <div class="col-md-4">

                                    <div class="pull-right"><p><strong style="color:red;">*</strong>&nbsp;&nbsp;Required</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>


                </div>



            </div>

        </div>


        <div class="col-md-2"></div>

    </div>


@endsection
