@if(isset($matoleo))
<div class='row'>


</div>
<div class='tile-title'><center>TAARIFA YA SADAKA PAROKIA YA BUGANDO</center> 
    <center>KUANZIA TAREHE {{date('d . m .Y',strtotime($from))}} HADI TAREHE {{date('d . m .Y',strtotime($to))}}</center>

</div>
<div class="table-responsive-sm table-responsive-md">
       <table border="0" cellpadding="0" cellspacing="0" class="table table-bordered  table-responsive-sm  month">
    
        <tr>
            <th class="text-center">TAREHE</th>
            <th class="text-center">VIGANGO</th>
            <th class="text-center">NJIA ZA UTOAJI</th>
            <th colspan="2" class="text-center">MATOLEO</th>
            <th colspan="2" class="text-center">HARAMBEE</th>
        </tr>
        <tr class="michango">
            <th class=" text-center michango"></th>
            <th class="text-center michango"></th>
            <th class="text-center michango"></th>
            <th class="text-center">sadaka</th>
            <th class="text-center">shukrani</th>
            <th class=" text-center">kwa ajili</th>
            <th class=" text-center ">Kiasi</th>
        </tr>
    
        {{-- total count variables --}}
        <span style="display: none">{{$total_sadaka = 0}}</span>
        <span style="display: none">{{$total_shukrani = 0}}</span>
        <span style="display: none">{{$total_harambe = 0}}</span> {{-- end of total count variable --}} @foreach ($matoleo as
        $toleo)
    
        <span style="display: none">{{$bahasha_shukrani = 0}}</span>
        <span style="display: none">{{$harambee = 0}}</span>
    
        <tr class="">
            <td class="  lead"> {{date('d.m.Y',strtotime($toleo->date))}}</td>
            <td class="list1"></td>
            <td class="text-center "></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class=" text-center "></td>
            <td class=" text-center "></td>
        </tr>
        @foreach ($toleo->general as $g)
        <tr>
            <td></td>
            <td>
                <span class='text-capitalize'>{{$g->kigango}}</span><br>
            </td>
            <td class='font'>
                <span>Sanduku</span><br>
                <span>Bahasha</span><br>
            </td>
    
            <td class='font'>
                {{-- sanduku --}}
                <span style="display:none">{{$total_sadaka+= $g->sadaka }} </span>
                <span>{{number_format($g->sadaka,2)}}/=</span><br> {{-- end sanduku --}} {{-- bahasha --}}
                <span style="display: none">{{$bahasha_sadaka = 0}}</span> @foreach ($toleo->member_matoleo as $m ) @if($g->kigango
                == $m->family->jumuiya->mtaa->kigango->name)
                <span style="display:none">{{$bahasha_sadaka+= $m->pivot->sadaka }}</span>
                <span style="display:none">{{$total_sadaka+= $m->pivot->sadaka }}</span> @endif @if($loop->last) <span>{{number_format($bahasha_sadaka,2)}}/=</span>
                <span style="display: none">{{$bahasha_sadaka = 0}}</span><br> @endif @endforeach {{-- end bahasha --}}
    
            </td>
            <td class='font'>
                {{-- shukrani --}}
                <span style="display:none">{{$total_shukrani+= $g->shukrani }}</span>
                <span>{{number_format($g->shukrani,2)}}/=</span><br> {{-- end of shukrani --}} {{-- bahasha --}}
                <span style="display: none">{{$bahasha_shukrani = 0}}</span> @foreach ($toleo->member_matoleo as $m ) @if($g->kigango
                == $m->family->jumuiya->mtaa->kigango->name)
                <span style="display:none">{{$bahasha_shukrani+= $m->pivot->shukrani }}</span>
                <span style="display:none">{{$total_shukrani+= $m->pivot->shukrani }}</span> @endif @if($loop->last) <span>{{number_format($bahasha_shukrani,2)}}/=</span>
                <span style="display: none">{{$bahasha_shukrani = 0}}
                            </span><br> @endif @endforeach {{-- end bahasha --}}
            </td>
            <td>
    
                @foreach ($toleo->harambee as $harambe) @if($g->kigango == $harambe->kigango) @if($harambe->amount==null)
                <div class="ml-1 fa fa-minus"></div>
                @else
                <div>{{$harambe->title}}</div>
    
                @endif @endif @endforeach
            </td>
            <td class=" text-center ">
                @foreach ($toleo->harambee as $harambe) @if($g->kigango == $harambe->kigango) @if($harambe->amount==null)
                <div class="ml-1 fa fa-minus"></div>
                @else {{number_format($harambe->amount,2)}}/=
    
                <div style="display: none">{{number_format($harambee += $harambe->amount,2) }} </div>
                <span style="display: none">{{number_format($total_harambe += $harambe->amount ,2)}}</span> @endif
                <br> @endif @endforeach
            </td>
    
        </tr>
        @endforeach @endforeach
        <tr>
            <th colspan="3" class="text-center ">JUMLA</th>
            
            <th>{{ number_format($total_sadaka, 2 ) }}/=</th>
            <th> {{ number_format($total_shukrani, 2 ) }}/=</th>
            <th colspan='2' class="text-center ">{{ number_format($total_harambe, 2 ) }}/=</th>
    
        </tr>
    
    </table>
</div>



@endif