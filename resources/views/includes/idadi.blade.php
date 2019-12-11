

@if($members->donation_type=='member')
<span class='text-muted'>{{$count_member}}</span>
@elseif ($members->donation_type=='family')
<span class='text-muted'>{{$count_family}}</span>

   @elseif ($members->donation_type=='jumuiya')
<span class='text-muted'>{{$count_jumuiya}}</span>

   @elseif ($members->donation_type=='kigango')
<span class='text-muted'>{{$count_kigango}}</span>

   @elseif ($members->donation_type=='mtaa')
<span class='text-muted'>{{$count_mtaa}}</span>


@endif