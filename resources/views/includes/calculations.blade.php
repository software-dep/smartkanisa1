
@if($members->donation_type=='member')

        @foreach($members->members as $key=>$don)
   
      <div style='display:none'> {{$don->pivot->amount}}</div>

        @endforeach

<span class='text-muted'>{{$count_member*$members->amount}}</span>
@elseif ($members->donation_type=='family')
          @if($count_family*$members->amount==0)
                      <span class='text-muted'>Null</span>
                   @else
                     <span class='text-muted'>{{$count_family*$members->amount}}</span>
          @endif


   @elseif ($members->donation_type=='jumuiya')
<span class='text-muted'>{{$count_jumuiya*$members->amount}}</span>

   @elseif ($members->donation_type=='kigango')
<span class='text-muted'>{{$count_kigango*$members->amount}}</span>

   @elseif ($members->donation_type=='mtaa')
<span class='text-muted'>{{$count_mtaa*$members->amount}}</span>


@endif