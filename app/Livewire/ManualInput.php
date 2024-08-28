<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\AlasData;

class ManualInput extends Component
{
    public $temperature;
    public $temperatureUnit = '°C'; 

    public $humidity;
    public $humidityUnit = '%'; 

    public $airPressure;
    public $airPressureUnit = 'mb'; 

    public $windSpeed;
    public $windSpeedUnit = 'km/h'; 

    public $windDirection;
    public $windDirectionUnit = '°';

    public $precipitation;
    public $precipitationUnit = 'mm'; 
    
    public $date;

    public function store()
    {
       $date = $this->date
            ? Carbon::parse($this->date)
            : now()->timezone('Asia/Manila');

            // wire:model sa forms yung mga $this->
            //  
        $weatherDataFields = [
            'temperature' => [
                'censor' => 'Temperature',  
                'value' => $this->temperature,
                'unit' => $this->temperatureUnit,
            ],
            'humidity' => [
                'censor' => 'Humidity',
                'value' => $this->humidity,
                'unit' => $this->humidityUnit,
            ],
            'airPressure' => [
                'censor' => 'Air Pressure',
                'value' => $this->airPressure,
                'unit' => $this->airPressureUnit,
            ],
            'windSpeed' => [
                'censor' => 'Wind Speed',
                'value' => $this->windSpeed,
                'unit' => $this->windSpeedUnit,
            ],
            'windDirection' => [
                'censor' => 'Wind Direction',
                'value' => $this->windDirection,
                'unit' => $this->windDirectionUnit,
            ],
            'precipitation' => [
                'censor' => 'Precipitation',
                'value' => $this->precipitation,
                'unit' => $this->precipitationUnit,
            ],
        ];
        
        foreach ($weatherDataFields as $field => $data) {
            if ($this->$field) {
                $weatherData = new AlasData();
                $weatherData->censor = $data['censor'];
                $weatherData->value = $data['value'];
                $weatherData->unit = $data['unit'];
                $weatherData->created_at = $date;
                $weatherData->updated_at = $date;
                $weatherData->save();
            }
        }

        $this->reset('temperature', 'humidity', 'airPressure', 'windSpeed', 'windDirection', 'precipitation');
        return redirect('table')->back();
    }


    public function render()
    {
        return view('livewire.modal.manual-input');
    }


}
