<div>
    <div class="grid grid-col-3">    
        <div >
            <button 
            class="mt-6 text-white bg-blue-900 hover:bg-blue-800 focus:ring-2 focus:ring-blue-700 font-medium rounded-lg text-sm px-8 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" 
            type="button" 
            data-drawer-target="drawer-collect" 
            data-drawer-show="drawer-collect" 
            aria-controls="drawer-collect">
            Add
            </button>
        </div>

        <div class="col-start-3">
            <div class="flex  mb-4 ">
                <div class="w-1/2">
                    <label for="start_date" class="block text-sm font-medium text-white">Start Date</label>
                    <input type="date" id="start_date" wire:model="startDate" class="mt-1 block w-full pl-10 text-sm text-gray-700">
                </div>
                <div class="w-1/2">
                    <label for="end_date" class="block text-sm font-medium text-white">End Date</label>
                    <input type="date" id="end_date" wire:model="endDate" class="mt-1 block w-full pl-10 text-sm text-gray-700">
                </div>
                <button wire:click="search" class="bg-blue-900 ml-1 mt-auto h-10 hover:bg-blue-800 focus:ring-2 focus:ring-blue-700 text-white font-bold py-2 px-4 rounded">
                    Search
                </button>
            </div>
    </div>

    </div>
        <table class="m-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Temperature</th>
                    <th scope="col" class="px-6 py-3">
                        Humidity</th>
                    <th scope="col" class="px-6 py-3">
                        Air Pressure</th>
                    <th scope="col" class="px-6 py-3">
                        Wind Speed</th>
                    <th scope="col" class="px-6 py-3">
                        Wind Direction</th>
                    <th scope="col" class="px-6 py-3">
                        Precipitation</th>
                    <th scope="col" class="px-6 py-3">
                        Date/Time</th>

                    <th scope="col" class="px-6 py-3">
                            Update</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($groupByDate as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $row['tValue'] }}
                        {{ $row['tUnit'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $row['hValue'] }}
                        {{ $row['hUnit'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $row['apValue'] }}
                        {{ $row['apUnit'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $row['wsValue'] }}
                        {{ $row['wsUnit'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $row['wdValue'] }}
                        {{ $row['wdUnit'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $row['pValue'] }}
                        {{ $row['pUnit'] }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $row['date'] }}
                    </td>

                    <td>
                           
                        <button   
                            data-bs-toggle="modal"  
                            data-bs-target="#editByDate"  
                            class="mt-6 text-white bg-blue-900 hover:bg-blue-800 focus:ring-2 focus:ring-blue-700 font-medium rounded-lg text-sm px-8 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" 
                            wire:click="$emit('edit', '{{ $row['date'] }}')">
                                Edit
                                
                        </button>
                    </td>

                </tr>
                @endforeach 
            </tbody>
        </table>
        @include('livewire.modal.edit-data')
</div>