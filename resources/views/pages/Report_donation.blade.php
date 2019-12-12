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
            <li class="breadcrumb-item">Report</li>
            <li class="breadcrumb-item"><a href="{{url('/Donations_report')}}">Donation Report</a></li>
        </ul>
    </div>
    <report-donation-component></report-donation-component>
 {{-- <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                   @include('includes.Response_Message')
                    <div class="tile">
                            <h3 class="tile-title">Choose Donations Report</h3>
                            <table class='table table-borderless '>
                                <tbody>
                                    <tr>
                                    
                                            <td class='lead links-1'> 
                                                    <form action ="{{url('Report-Donations')}}">
                                                            {{csrf_field()}}
                                                            <input name='donation'  value='member' style='display:none'>
                                    
                                                <span class='fa fa-list'></span>&nbsp;<button style="border: none; background-color:white" type="submit">Member</button>
                                            </form>
                                            </td>
                                       
                                          
                                    </tr>
                                    <tr>
                                            <td class='lead links-1'>
                                                    <form action ="{{url('Report-Donations')}}">
                                                            {{csrf_field()}}
                                                            <input name='donation'  value='family' style='display:none'>
                                    
                                                <span class='fa fa-list'></span>&nbsp;<button style="border: none ; background-color:white" type="submit">Family</button>
                                            </form>
                                        
                                     </tr>
                                      <tr>
                                            <td class='lead links-1'>
                                                    <form action ="{{url('Report-Donations')}}">
                                                            {{csrf_field()}}
                                                            <input name='donation'  value='jumuiya' style='display:none'>
                                    
                                                <span class='fa fa-list'></span>&nbsp;<button style="border: none; background-color:white" type="submit">Jumuiya</button>
                                            </form>    
                                            </td>
                                     </tr> 
                                         <tr>
                                            <td class='lead links-1'><form action ="{{url('Report-Donations')}}">
                                                    {{csrf_field()}}
                                                    <input name='donation'  value='mtaa' style='display:none'>
                    
                                                  <span class='fa fa-list'></span>&nbsp;<button style="border: none; background-color:white" type="submit">Mitaa</button>
                                    </form>
                                </td>
                                    </tr>
                                      <tr>
                                            <td class='lead links-1'><form action ="{{url('Report-Donations')}}">
                                                    {{csrf_field()}}
                                                    <input name='donation'  value='kigango' style='display:none'>
                            
                                        <span class='fa fa-list'></span>&nbsp;<button style="border: none;background-color:white
                                        " type="submit">Vigango</button>
                                             </form>
                                              </td>
                                     </tr>
                                </tbody>

                            </table>
                    </div>
             </div>

      

    <div class="col-md-2"></div>

    </div> --}}


@endsection

