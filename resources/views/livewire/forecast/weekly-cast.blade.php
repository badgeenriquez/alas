<div  class="bg-white/10 w-fit m-auto p-4 rounded-lg">
    <div  class="font-extrabold text-center pb-2">
        <h1>7 Days Recent</h1>
        <h1>Temperature</h1>
    </div>
    <div class="flex flex-row-reverse place-content-center gap-4"> 
            @foreach($missingDates as $missingDate)
                @if(isset($missingDate['message']))
                    <div class="font-thin w-20  text-center rounded-lg transition ease-in-out delay-150 bg-[#bd4a11]/50  hover:-translate-y-1 hover:scale-110 hover:hover:bg-[#e46212] duration-300">
                        <div class=" font-thin ">{{ \Carbon\Carbon::parse($missingDate['date'])->format('l') }}</div>
                        <div class="font-extrabold">
                            {{ $missingDate['message'] }}
                        </div>
                        <div class="w-8 mx-auto mt-4">
                            <img src="{{url('/animatedsvg/no-data-svgrepo-com.svg')}}" alt="">
                        </div>
                    </div>
                @else
                    <div class="font-thin w-20 text-center rounded-lg transition ease-in-out delay-150 bg-[#bd4a11]/50  hover:-translate-y-1 hover:scale-110 hover:hover:bg-[#e46212] duration-300">
                        @foreach($temp as $item)
                            @if($item->created_at->format('l, M j, Y') == $missingDate['date'])
                                    @php
                                        $date = \Carbon\Carbon::parse($missingDate['date']);
                                        $today = \Carbon\Carbon::today();
                                    @endphp
                                        @if($date->isToday())
                                           Today 
                                        @else
                                            {{ $date->format('l') }}
                                        @endif
                                <div class=" font-extrabold">{{ $item->value }}{{ $item->unit }}</div>
                                <div class="w-16  mx-auto">
                                        @if($item->value < 20)
                                            <img src="{{url('/animatedsvg/snowy-6.svg')}}">                                           
                                        @elseif($item->value < 40)
                                            <img src="{{url('/animatedsvg/cloudy.svg')}}">
                                        @else                                      
                                            <img src="{{url('/animatedsvg/day.svg')}}">
                                        @endif 
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
    </div>
</div>
