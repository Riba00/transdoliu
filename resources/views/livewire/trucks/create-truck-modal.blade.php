<div x-data="{ isCreateTruckModalOpen: false }" class="relative z-40" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" x-show="isCreateTruckModalOpen"
    x-on:open-truck-create-modal.window="isCreateTruckModalOpen = true"
    x-on:close-truck-create-modal.window="isCreateTruckModalOpen = false" x-cloak>
    <!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
            <div @click.away="isCreateTruckModalOpen = false" @keydown.escape.window="isCreateTruckModalOpen = false"
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="flex items-center justify-between">

                    <div class="flex items-center">
                        <h3 class="text-sm sm:text-xl font-semibold text-gray-900" id="modal-title">CREATE NEW TRUCK</h3>
                    </div>

                    <div @click="isCreateTruckModalOpen = false">

                        <x-svg.cross class="size-7 hover:cursor-pointer" />
                    </div>
                </div>

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name *</label>
                        <div class="">
                            <input type="text" name="name" id="name" autocomplete="given-name" wire:model="name"
                                class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 {{ $errors->has('name') ? 'border-2 border-red-500 bg-red-50' : 'bg-white' }}">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600" id="name-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="plateNumber" class="block text-sm/6 font-medium text-gray-900">Plate Number *</label>
                        <div class="">
                            <input type="text" name="plateNumber" id="plateNumber" autocomplete="given-name" wire:model="plateNumber"
                                class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 {{ $errors->has('plateNumber') ? 'border-2 border-red-500 bg-red-50' : 'bg-white' }}">
                        </div>
                        @error('plateNumber')
                            <p class="mt-2 text-sm text-red-600" id="plateNumber-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="capacity" class="block text-sm/6 font-medium text-gray-900">Capacity *</label>
                        <div class="">
                            <input type="number" name="capacity" id="capacity" autocomplete="given-name" wire:model="capacity"
                                class="block w-full rounded-md px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 {{ $errors->has('capacity') ? 'border-2 border-red-500 bg-red-50' : 'bg-white' }}">
                        </div>
                        @error('capacity')
                            <p class="mt-2 text-sm text-red-600" id="capacity-error">{{ $message }}</p>
                        @enderror
                    </div>



                </div>
                <p class="mt-5 text-gray-600 text-sm">(*) Required fields</p>



                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button type="button" @click="$wire.createTruck()"
                        class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">Create</button>
                    <button type="button" @click="isCreateTruckModalOpen = false"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>