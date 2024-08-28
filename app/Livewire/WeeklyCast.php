<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\AlasData;

class WeeklyCast extends Component
{
    public $temp, $todayTemp;

    public $todayhumidity, $humidity;

    public $airpressure;

    public $windspeed;

    public $precipitation;
    public function mount()
    {
        $this->loadData();
    }

public function loadData()
{

    $date = Carbon::now()->subDays(7);
    
    $this->temp = AlasData::
        whereDate('created_at', '>=', $date)
        ->where('censor','like','temperature')
        ->orderBy('created_at', 'asc')
        ->get()
        ->groupBy(function ($item) 
            {
                return $item->created_at->format('l, M j, Y');
            })
        ->map(function ($group) 
            {
                return $group->last();
            });

        $this->todayTemp = $this->temp->firstWhere(function ($item) 
            {
                return $item->created_at->isToday();
            });

        $this->humidity = AlasData::
        whereDate('created_at', '>=', $date)
        ->where('censor','like','humidity')
        ->orderBy('created_at', 'asc')
        ->get()
        ->groupBy(function ($item) 
            {
                return $item->created_at->format('l, M j, Y');
            })
        ->map(function ($group) 
            {
                return $group->last();
            });

        $this->todayhumidity = $this->humidity->firstWhere(function ($item) 
            {
                return $item->created_at->isToday();
            });



            // Air Pressure
                $airpressure = AlasData::
                where('censor', 'like', 'air pressure')
                ->latest()
                ->get()
                ->groupBy('censor')
                ->map(function ($group) 
                    {
                        return $group->first();
                    });

            $currentDate = Carbon::today()->format('Y-m-d');
            $airpressNow = $airpressure->firstWhere(function ($item) use ($currentDate) 
                {
                    return $item->created_at->format('Y-m-d') == $currentDate;
                });

            if ($airpressNow) 
                {
                    $this->airpressure = $airpressNow;
                } 
            else 
                {
                    $this->airpressure = ['value' => '--'];
                }

            // WindSpeed
            $windspeed = AlasData::
            where('censor', 'like', 'wind speed')
            ->latest()
            ->get()
            ->groupBy('censor')
            ->map(function ($group) 
                {
                    return $group->first();
                });

        $currentDate = Carbon::today()->format('Y-m-d');
        $windspeedNow = $windspeed->firstWhere(function ($item) use ($currentDate) 
            {
                return $item->created_at->format('Y-m-d') == $currentDate;
            });

        if ($windspeedNow) {
            $this->windspeed = $windspeedNow;
        } else {
            $this->windspeed = ['value' => '--'];
        }

            // Precipitation 
            $precipitation = AlasData::
            where('censor', 'like', 'precipitation')
            ->latest()
            ->get()
            ->groupBy('censor')
            ->map(function ($group) 
                {
                    return $group->first();
                });

        $currentDate = Carbon::today()->format('Y-m-d');
        $precipNow = $precipitation->firstWhere(function ($item) use ($currentDate) {
            return $item->created_at->format('Y-m-d') == $currentDate;
        });

        if ($precipNow) {
            $this->precipitation = $precipNow;
        } else {
            $this->precipitation = ['value' => '--'];
        }


}

    public function render()
        {
            $dates = $this->temp->pluck('created_at')
            ->map(function ($date) 
                {
                    return $date->format('l, M j, Y');
                })->all();

            $missingDates = [];
            for ($i = 0; $i < 7; $i++) {
                $expectedDate = Carbon::now()->subDays($i);
                if (!in_array($expectedDate->format('l, M j, Y'), $dates))
                    {
                    $missingDates[] = [
                        'date' => $expectedDate->format('l, M j, Y'),
                        'message' => '--',
                    ];
                    }
                else 
                    {
                    $missingDates[] = [
                        'date' => $expectedDate->format('l, M j, Y'),
                    ];
                    }
            }


            return view('livewire.forecast.weekly-cast', [
                'missingDates' => $missingDates,
            ]);
        }
}
