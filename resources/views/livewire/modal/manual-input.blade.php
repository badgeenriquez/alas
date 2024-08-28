<div>
    <div id="drawer-collect" 
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform  -translate-x-full bg-black/85 w-80 dark:bg-gray-800" 
        tabindex="-1" 
        aria-labelledby="drawer-contact-label">
        <h5 id="drawer-label" 
            class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
        <svg class="w-4 h-4 me-2.5" 
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
            fill="currentColor" 
            viewBox="0 0 20 16">
            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
        </svg>MANUAL COLLECTION</h5>
        <button type="button" data-drawer-hide="drawer-collect" aria-controls="drawer-collect" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span> 
        </button>
    
        <form wire:submit.prevent="store">
        
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="datetime">
                    Date and Time
                </label>
                <div class="form-group">
                    <input type="datetime-local" wire:model="date" class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="datetime" name="datetime" value="{{ old('datetime') }}">
                </div>
            </div>
    
                <div class="mb-6  grid grid-flow-col gap-1 grid-cols-[2fr_1fr]">
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="temperature">
                            Temperature
                        </label>
                        <input  pattern="[0-9]+(\.[0-9]+)?" 
                        oninvalid="this.setCustomValidity('Maleeeee')"
                        class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="temperature" >
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="temperatureUnit">
                            Unit
                        </label>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="temperatureUnit" >
                            <option value="°C">Celsius ( °C )</option>
                            <option value="°F">Fahrenheit ( °F )</option>
                            <option value="Kelvin">Kelvin</option>
                        </select>
                    </div>
                </div>
    
                <div class="mb-6 grid grid-flow-col gap-1 grid-cols-[2fr_1fr]">
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="humidity">
                            Humidity
                        </label>
                        <input pattern="[0-9]+(\.[0-9]+)?" 
                        oninvalid="this.setCustomValidity('Maleeeee')"
                        class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="humidity" >
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="humidityUnit">
                            Unit
                        </label>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="humidityUnit" >
                            <option value="%">%</option>
                        </select>
                    </div>
                </div>
    
    
                <div class="mb-6 grid grid-flow-col gap-1 grid-cols-[2fr_1fr]">
                    <div class="">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="airPressure">
                            Air Pressure
                        </label>
                        <input pattern="[0-9]+(\.[0-9]+)?" 
                        oninvalid="this.setCustomValidity('Maleeeee')"
                         class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="airPressure" >
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="airPressureUnit">
                            Unit
                        </label>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="airPressureUnit" >
                            <option value="hPa">hPa</option>
                            <option value="inHg">inHg</option>
                        </select>
                    </div>
                </div>
    
    
                <div class="mb-6 grid grid-flow-col gap-1 grid-cols-[2fr_1fr]">
                    <div class="">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="windSpeed">
                            Wind Speed
                        </label>
                        <input pattern="[0-9]+(\.[0-9]+)?" 
                        oninvalid="this.setCustomValidity('Maleeeee')"
                         class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="windSpeed" >
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="windSpeedUnit">
                            Unit
                        </label>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="windSpeedUnit" >
                            <option value="m/s">m/s</option>
                            <option value="km/h">km/h</option>
                        </select>
                    </div>
                </div>
    
    
                <div class="mb-6 grid grid-flow-col gap-1 grid-cols-[2fr_1fr]">
                    <div class="">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="windDirection">
                            Wind Direction
                        </label>
                        <input pattern="[0-9]+(\.[0-9]+)?" 
                        oninvalid="this.setCustomValidity('Maleeeee')"
                         class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="windDirection" >
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="windDirectionUnit">
                            Unit
                        </label>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="windDirectionUnit" >
                            <option value="°">degrees ( ° )</option>
                        </select>
                    </div>
                </div>
    
    
                <div class="mb-6 grid grid-flow-col gap-1 grid-cols-[2fr_1fr]">
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="precipitation">
                            Precipitation
                        </label>
                        <input pattern="[0-9]+(\.[0-9]+)?" 
                        oninvalid="this.setCustomValidity('Maleeeee')"
                         class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="precipitation" >
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="precipitationUnit">
                            Unit
                        </label>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="precipitationUnit" >
                            <option value="mm">mm</option>
                            <option value="in">in</option>
                        </select>
                    </div>
                </div>
                <button type="submit" wire:loading.attr="disabled" class="text-white bg-gradient-to-b from-blue-800 to-blue-900  hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">SAVE</button>
    
        </form>
    </div>
</div>
    