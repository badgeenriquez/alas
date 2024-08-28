<div class="items-center justify-center ">
    <div class="lg:w-7/12 md:w-9/12 sm:w-10/12 mx-auto p-4">
        <div class="bg-white/10 drop-shadow-lg rounded-lg">
            <div class="justify-between px-6 py-3 bg-[#793215]">
                <h2 class="font-bold text-center text-white">{{ $monthNames[$month - 1] }} {{ $year }} (AVG)</h2>
            </div>

            <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
                @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                    <div class="text-center font-semibold bg-[#bd4a11]/50 text-white">{{ $day }}</div>
                @endforeach

                @for($i = 0; $i < $firstDayOfWeek; $i++)
                    <div></div>
                @endfor
                
                @foreach($calendarData as $avgTemp)
                    <div class="text-white bg-[#361307]/25 text-start py-2 border border-[#793215]/25 rounded-lg cursor-pointer pl-2  transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-110  duration-300 {{ $avgTemp['today']? 'bg-[#bd4a11]/50 text-white hover:bg-[#e46212]/50 ' : 'hover:bg-[#e46212]/25' }}">
                        {{ $avgTemp['day'] }}
                        @if($avgTemp['today'])
                            @if($avgTemp['average'])
                                <div class="text-xs">{{ $avgTemp['average'] }}°C</div>
                            @else
                                <div class="text-xs">No data </div>
                            @endif
                        @elseif($avgTemp['date']->lte(\Carbon\Carbon::today()))
                            @if($avgTemp['average'])
                                <div class="text-xs">{{ $avgTemp['average'] }}°C</div>
                            @else
                                <div class="text-xs">No data</div>
                            @endif
                        @endif
                    </div>
                @endforeach
        </div>
    </div>
</div>