@if($members->donation_type=='member')
waumini
@elseif ($members->donation_type=='family')
   familia 

   @elseif ($members->donation_type=='jumuiya')
   jumuiya

   @elseif ($members->donation_type=='kigango')
   Vigango

   @elseif ($members->donation_type=='mtaa')
   Mitaa


@endif



