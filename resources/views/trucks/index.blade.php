<x-app-layout>
    <div x-data="{ currentTruckTab : 'trucks' }">
        <div class="border-b border-gray-200 pb-5 sm:pb-0">
            <h3 class="text-2xl font-semibold text-gray-900">Trucks</h3>
            <div class="mt-3 sm:mt-4">
                <div class="grid grid-cols-1 sm:hidden">
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select aria-label="Select a tab"
                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option>Trucks</option>
                        <option>Drivers</option>
                        <option selected>Interview</option>
                        <option>Offer</option>
                        <option>Hired</option>
                    </select>
                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500"
                        viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <!-- Tabs at small breakpoint and up -->
                <div class="hidden sm:block">
                    <nav class="-mb-px flex space-x-8">
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <button @click="currentTruckTab = 'trucks'" :class="currentTruckTab === 'trucks' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">Trucks</button>
                        <button @click="currentTruckTab = 'drivers'" :class="currentTruckTab === 'drivers' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">Drivers</button>
                    </nav>
                </div>
            </div>
        </div>


        
        <div x-show="currentTruckTab === 'trucks'" class="mt-6">
            <div class="flex justify-end">
                <button type="button" @click="$dispatch('open-truck-create-modal')"
                class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create New Truck</button>
            </div>
            
            <livewire:trucks.trucks-table />
            <livewire:trucks.create-truck-modal />
            
        </div>

        <div x-show="currentTruckTab === 'drivers'" class="mt-6" x-cloak>
            DRIVERS
        </div>
    </div>


</x-app-layout>