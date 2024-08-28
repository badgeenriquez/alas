<div>
        <div wire:ignore.self class="modal fade" id="editByDate" tabindex="-1" aria-labelledby="editByDate"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button  class="btn-close" data-bs-dismiss="modal" type="button"
                            aria-label="Close"></button>      
                    </div>

                <div class="modal-body">
                    <form wire:submit.prevent="update">
        
                       
                        <form wire:submit.prevent="update">
                            <div class="form-group">
                                <label for="temperature">Temperature</label>
                                <input type="number" id="temperature" wire:model="temperature" class="form-control" step="0.1">
                            </div>
                            <div class="form-group">
                                <label for="humidity">Humidity</label>
                                <input type="number" id="humidity" wire:model="humidity" class="form-control" step="0.1">
                            </div>
                            <div class="form-group">
                                <label for="airPressure">Air Pressure</label>
                                <input type="number" id="airPressure" wire:model="airPressure" class="form-control" step="0.1">
                            </div>
                            <div class="form-group">
                                <label for="windSpeed">Wind Speed</label>
                                <input type="number" id="windSpeed" wire:model="windSpeed" class="form-control" step="0.1">
                            </div>
                            <div class="form-group">
                                <label for="windDirection">Wind Direction</label>
                                <input type="number" id="windDirection" wire:model="windDirection" class="form-control" step="0.1">
                            </div>
                            <div class="form-group">
                                <label for="precipitation">Precipitation</label>
                                <input type="number" id="precipitation" wire:model="precipitation" class="form-control" step="0.1">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                            <button type="submit" wire:loading.attr="disabled" class="text-white bg-gradient-to-b from-blue-800 to-blue-900  hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">UPDATE</button>
                
                    </form>
                </div>
            </div>
        </div>
</div>
