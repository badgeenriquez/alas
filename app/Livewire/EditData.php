<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\AlasData;

class EditData extends Component
{       
    protected $listeners = ['edit'];

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
    public $editDate;

    public function mount($date = null)
    {
        if ($date) {
            $this->editDate = $date;
            $this->loadData($date);
        }
    }

    public function edit($date)
    {
        $formatdate = Carbon::parse($date)->format('Y-m-d H:i:s');

        $data = AlasData::where('created_at', $formatdate)
            ->whereIn('censor', ['Temperature', 'Humidity', 'Air Pressure', 'Wind Speed', 'Wind Direction', 'Precipitation'])
            ->get()
            ->groupBy('censor')
            ->mapWithKeys(function ($group) {
                $item = $group->first();
                return [$item->censor => [
                    'value' => $item->value,
                    'unit' => $item->unit,
                ]];
            })
            ->toArray();

            $this->temperature = $data['Temperature']['value'] ?? null;
            $this->temperatureUnit = $data['Temperature']['unit'] ?? '°C'; 

            $this->humidity = $data['Humidity']['value'] ?? null;
            $this->humidityUnit = $data['Humidity']['unit'] ?? '%'; 

            $this->airPressure = $data['Air Pressure']['value'] ?? null;
            $this->airPressureUnit = $data['Air Pressure']['unit'] ?? 'mb'; 

            $this->windSpeed = $data['Wind Speed']['value'] ?? null;
            $this->windSpeedUnit = $data['Wind Speed']['unit'] ?? 'km/h'; 

            $this->windDirection = $data['Wind Direction']['value'] ?? null;
            $this->windDirectionUnit = $data['Wind Direction']['unit'] ?? '°';

            $this->precipitation = $data['Precipitation']['value'] ?? null;
            $this->precipitationUnit = $data['Precipitation']['unit'] ?? 'mm'; 
        }

    public function update()
    {
        $date = $this->editDate
            ? Carbon::parse($this->editDate)
            : now()->timezone('Asia/Manila');

        $weatherDataFields = [
            'Temperature' => [
                'value' => $this->temperature,
                'unit' => $this->temperatureUnit,
            ],
            'Humidity' => [
                'value' => $this->humidity,
                'unit' => $this->humidityUnit,
            ],
            'Air Pressure' => [
                'value' => $this->airPressure,
                'unit' => $this->airPressureUnit,
            ],
            'Wind Speed' => [
                'value' => $this->windSpeed,
                'unit' => $this->windSpeedUnit,
            ],
            'Wind Direction' => [
                'value' => $this->windDirection,
                'unit' => $this->windDirectionUnit,
            ],
            'Precipitation' => [
                'value' => $this->precipitation,
                'unit' => $this->precipitationUnit,
            ],
        ];

        foreach ($weatherDataFields as $censor => $data) {
            $weatherData = AlasData::where('created_at', $date)
                ->where('censor', $censor)
                ->first();

            if ($weatherData) {
                $weatherData->value = $data['value'];
                $weatherData->unit = $data['unit'];
                $weatherData->updated_at = $date;
                $weatherData->save();
            } else {
                // If there's no existing data for this censor, create a new record
                $weatherData = new AlasData();
                $weatherData->censor = $censor;
                $weatherData->value = $data['value'];
                $weatherData->unit = $data['unit'];
                $weatherData->created_at = $date;
                $weatherData->updated_at = $date;
                $weatherData->save();
            }
        }

        $this->reset('Temperature','Humidity','Air Pressure','Wind Speed','Wind Direction','Precipitation');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.modal.edit-data', [
            'temperature' => $this->temperature,
            'temperatureUnit' => $this->temperatureUnit,
            'humidity' => $this->humidity,
            'humidityUnit' => $this->humidityUnit,
        ]);
    }
}
 