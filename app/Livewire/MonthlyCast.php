<?php

namespace App\Livewire;

use App\Models\AlasData;
use Carbon\Carbon;
use Livewire\Component;

class MonthlyCast extends Component
{
    public $year;
    public $month;
    public $daysInMonth;
    public $calendarData = [];
    public $firstDayOfWeek;

    public function mount()
    {
        $this->year = now()->year;
        $this->month = now()->month;
        $this->daysInMonth = Carbon::createFromDate($this->year, $this->month, 1)->daysInMonth;
        $this->firstDayOfWeek = Carbon::createFromDate($this->year, $this->month, 1)->dayOfWeek;

        $this->generateCalendarData();
    }

    public function generateCalendarData()
        {
            $this->calendarData = [];
            for ($i = 1; $i <= $this->daysInMonth; $i++) {
                $date = Carbon::createFromDate($this->year, $this->month, $i);
                $tempData = AlasData::where('censor','like','temperature')
                ->whereDate('created_at', $date->toDateString())
                ->get();
                $totaltemp = $tempData->sum('value');
                $count = $tempData->count();
                $averageTemp = $count > 0 ? round($totaltemp / $count) : null;
                
                $this->calendarData[] = [
                    'date' => $date,
                    'day' => $date->format('d'),
                    'today' => $date->isToday(),
                    'data' => $tempData,
                    'average' => $averageTemp,
                ];
            }
        }


    public function render()
    {
        return view('livewire.forecast.monthly-cast', [
            'calendarData' => $this->calendarData,
            'monthNames' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'firstDayOfWeek' => $this->firstDayOfWeek,

        ]);
    }
}
