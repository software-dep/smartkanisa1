<html>
    <head>
       
<style>
.table,.tr,{
        border:1px solid black;
    }

    .table{
        width:100%;
    }

    .th{
        height: 50px;
    }
</style>
   

   
    </head>

</body>

<div class="row">
      

        <div class="col-md-12 tile">

            <table >
                <thead>
                    <tr>
                            <th class='h2'>Report ya  @include('includes.mchango') mchango wa {{$members->name}} </th>
                    </tr>
                    <tr>
                            <td >  &nbsp;Idadi  ya @include('includes.mchango') <span class='text-muted'>@include('includes.idadi')</span></td>
                    </tr>
                    <tr>
                            <td>  &nbsp;Kiwango kidogo cha Mchango kwa @include('includes.mchango') ni 
                               
                                @if($members->amount==0)
                                0
                                @else
                                {{$members->amount}}
                                @endif
                            </td>
                    </tr>

                    <tr>
                            <td>  &nbsp;Makadirio ya makusanyo ni 
                                @foreach($members->members as $key=>$don)
                               @if($loop->first)
                                    <span class='text-muted'> @include('includes.calculations')</span>
                                     @else
                                     <div style='display:none'> {{$don->pivot->amount}}</div>
                               @endif
                                 @endforeach
                            </td>
                    </tr>

                    <tr>
                            <td>  &nbsp;Jumla ya makusanyo ni 
                                @foreach($members->members as $key=>$don)
                               @if($loop->first)
                                    <span class='text-muted'> @include('includes.makusanyo')</span>
                                     @else
                                     <div style='display:none'> {{$don->pivot->amount}}</div>
                               @endif
                                 @endforeach
                            </td>
                    </tr>

             <tr><td>
            
                </thead>
            </table>
               
            <h3>List ya  @include('includes.mchango') katika mchango wa {{$members->name}} </h3>
                          @if(isset($members))
                     <table  class="table">
                         <thead>
                         <tr class="tr">
                             <th class='td' >No.</th>
                             <th class='td'>Name</th>
            
    
                             <th class='td'>Paid</th>
                             <th class='td'>Remained</th>
                         </tr>
 
                         </thead>
 
                         <tbody>
                             
                        <?php $count =1; ?>
                         @foreach($members->members as $key=>$don )
                             <tr class="tr">
                                 <td>{{$count++}}</td>
                                 <td class="text-capitalize">{{$don->name}}</td>

                                 <td class="text-capitalize">{{$don->pivot->amount}}</td>
                                 <td class="text-capitalize">
                                    @if ( ($members->amount - $don->pivot->amount) == 0)
                                        <span  style="color: #1b4b72">-</span>
 
                                        @elseif(($don->pivot->amount - $members->amount) > 0)
                                         <span  style="color: #1b4b72">-</span>
                                        @else
                                         <span style='color:red'>{{$members->amount - $don->pivot->amount}}</span>
                                     @endif
                                 </td>
 
 
                             </tr>
                         @endforeach
 
 
                         </tbody>
 
                     </table>
                   
                     @else
                     <div class="alert alert-heading">
                         <h6>Empty list</h6>
                     </div>
                 @endif
 
 
                   
               
         </div>

  


</div>
</body>
    <html>