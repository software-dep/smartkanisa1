@if($members->donation_type=='member')
@php($total = 0)
    @foreach($members->members as $key=>$don)
        @php($total += $don->pivot->amount )
    @endforeach
    <span > {{$total}}</span>


@elseif ($members->donation_type=='family')
    @php($total = 0)
     @foreach($members->family as $key=>$don)
        @php($total += $don->pivot->amount )
    @endforeach
    <span > {{$total}}</span>

   @elseif ($members->donation_type=='jumuiya')
       @php($total = 0)
              @foreach($members->jumuiya as $key=>$don)
                  @php($total += $don->pivot->amount )
             @endforeach
             <span > {{$total}}</span>

   @elseif ($members->donation_type=='kigango')
       @php($total = 0)
           @foreach($members->kigango as $key=>$don)
                 @php($total += $don->pivot->amount )
           @endforeach 
           <span >{{$total}}</span>           

   @elseif ($members->donation_type=='mtaa')
       @php($total = 0)
            @foreach($members->mtaa as $key=>$don)
               @php($total += $don->pivot->amount )
            @endforeach
            <span >{{$total}}</span>


@endif