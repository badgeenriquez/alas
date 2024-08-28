<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AlasData;

class DataControl extends Component
{   
    
    public $groupByDate;

    public function render()
        {
            $data = AlasData::
                        latest()
                        ->get()
                        ->groupBy(function ($item) {
                            $timestamp = $item->created_at->timestamp;
                            $tolerance = 2;
                            $groupKey = floor($timestamp / $tolerance) * $tolerance;
                            return date('Y-m-d H:i:s', $groupKey);
                        });

                    $this->groupByDate = [];
                    foreach ($data as $date => $rows) {
                        $temperature = $rows->where('censor', 'Temperature')->first();

                        $humidity = $rows->where('censor', 'Humidity')->first();

                        $airPressure = $rows->where('censor', 'Air Pressure')->first();

                        $windSpeed = $rows->where('censor', 'Wind Speed')->first();

                        $windDirection = $rows->where('censor', 'Wind Direction')->first();
                    
                        $precipitation = $rows->where('censor', 'Precipitation')->first();

                        $this->groupByDate[] = [
                            'date' => $date,

                            'tValue' => $temperature? $temperature->value:'',
                            'tUnit' => $temperature? $temperature->unit:'',

                            'hValue' => $humidity? $humidity->value:' ', 
                            'hUnit'=>$humidity? $humidity->unit:'',

                            'apValue' => $airPressure? $airPressure->value:'',
                            'apUnit' => $airPressure? $airPressure->unit:'', 

                            'wsValue' => $windSpeed? $windSpeed->value:'',
                            'wsUnit'=> $windSpeed? $windSpeed->unit:'',

                            'wdValue' => $windDirection? $windDirection->value:'',
                            'wdUnit' => $windDirection? $windDirection->unit:'',


                            'pValue' => $precipitation? $precipitation->value:'',
                            'pUnit' => $precipitation? $precipitation->unit:'',
                        ];
                    }

            return view('livewire.datacontrol.data-control');
        }   

}
   

