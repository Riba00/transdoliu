<x-app-layout>
    <div x-data="{ currentCustomersTab : 'customers' }">
        <div class="border-b border-gray-200 pb-5 sm:pb-0">
            <h3 class="text-2xl font-semibold text-gray-900">Customers</h3>
            <div class="mt-3 sm:mt-4">
                <div class="grid grid-cols-1 sm:hidden">
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select aria-label="Select a tab" x-on:change="currentCustomersTab = $event.target.value"
                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        <option value="customers" selected>Customers</option>
                        <option value="locations">Locations</option>
                    </select>
                </div>
                <!-- Tabs at small breakpoint and up -->
                <div class="hidden sm:block">
                    <nav class="-mb-px flex space-x-8">
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <button @click="currentCustomersTab = 'customers'" :class="currentCustomersTab === 'customers' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">Customers</button>
                        <button @click="currentCustomersTab = 'locations'" :class="currentCustomersTab === 'locations' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                            class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">Locations</button>
                    </nav>
                </div>
            </div>
        </div>

        <div x-show="currentCustomersTab === 'customers'" class="mt-6">
            <div class="flex justify-end">
                <button type="button" @click="$dispatch('open-customer-create-modal')"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                    New Customer</button>
            </div>
            <div class="px-4 sm:px-0">
                <livewire:customers.customers-table />
            </div>

            <livewire:customers.create-customer-modal />
            <livewire:customers.edit-customer-modal />
            <livewire:customers.delete-customer-modal />
        </div>

        <div x-show="currentCustomersTab === 'locations'" class="mt-6" x-cloak>
            <div class="flex justify-end">
                <button type="button" @click="$dispatch('open-location-create-modal')"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                    New Location</button>
            </div>
            <div class="px-4 sm:px-0">
                <livewire:locations.locations-table />
            </div>

            <livewire:locations.create-location-modal />
            <livewire:locations.edit-location-modal />
            <livewire:locations.delete-location-modal />

        </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Listen for the custom event to open the modal
            window.addEventListener('truck-created', function () {
                // Open the modal here
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Truck Created Successfully",
                    showConfirmButton: false,
                    timer: 2500,
                    toast: true,
                    timerProgressBar: true,
                });
            });

            window.addEventListener('truck-deleted', function () {
                // Open the modal here
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Truck Deleted Successfully",
                    showConfirmButton: false,
                    timer: 2500,
                    toast: true,
                    timerProgressBar: true,
                });
            });

            window.addEventListener('truck-updated', function () {
                // Open the modal here
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Truck Saved Successfully",
                    showConfirmButton: false,
                    timer: 2500,
                    toast: true,
                    timerProgressBar: true,
                });
            });

        });
    </script>
</x-app-layout>