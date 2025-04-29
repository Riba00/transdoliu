<x-app-layout>
    <div>
        <div class="border-b border-gray-200 pb-5 sm:pb-0">
            <h3 class="text-2xl font-semibold text-gray-900">Users</h3>

        </div>

        <div class="mt-6">
            <div class="flex justify-end">
                <button type="button" @click="$dispatch('open-create-user-modal')"
                    class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add New User
                </button>
            </div>
            
            <div class="px-4 sm:px-0">
                <livewire:users.users-table />
            </div>
            
            <livewire:users.create-user-modal />
            <livewire:users.edit-user-modal />
            <livewire:users.delete-user-modal />


        </div>
    </div>
</x-app-layout>