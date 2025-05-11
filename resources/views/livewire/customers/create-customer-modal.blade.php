<div x-data="{ isCreateCustomerModalOpen: false }" class="relative z-40" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" x-show="isCreateCustomerModalOpen"
    x-on:open-customer-create-modal.window="isCreateCustomerModalOpen = true"
    x-on:close-customer-create-modal.window="isCreateCustomerModalOpen = false" x-cloak>
    <!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true" x-show="isCreateCustomerModalOpen"
        x-transition.duration></div>

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
            <div @click.away="isCreateCustomerModalOpen = false"
                @keydown.escape.window="isCreateCustomerModalOpen = false" x-show="isCreateCustomerModalOpen"
                x-transition.duration
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="flex items-center justify-between">

                    <div class="flex items-center">
                        <h3 class="text-sm sm:text-xl font-semibold text-gray-900" id="modal-title">CREATE NEW CUSTOMER
                        </h3>
                    </div>

                    <div @click="isCreateCustomerModalOpen = false">

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
                        <label for="location_id" class="block text-sm font-medium text-gray-900">Location *</label>

                        <select name="location_id" id="location_id" wire:model="location_id"
                            class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm {{ $errors->has('location_id') ? 'border-2 border-red-500 bg-red-50' : 'bg-white' }}">
                            <option disabled value="">Select a location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <p class="mt-2 text-sm text-red-600" id="location_id-error">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <p class="mt-5 text-gray-600 text-sm">(*) Required fields</p>



                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button type="button" @click="$wire.createCustomer()" wire:loading.attr="disabled"
                        class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">
                        <span wire:loading.remove>Create</span>

                        <div class="mx-4" role="status" wire:loading>
                            <x-svg.spinner class="size-4 text-gray-200 animate-spin fill-blue-600" />
                        </div>

                    </button>


                    <button type="button" @click="isCreateCustomerModalOpen = false"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>