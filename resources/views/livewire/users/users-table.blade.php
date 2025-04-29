<div class="mt-3 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black/5 rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 w-1/6">
                                Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 w-3/6">
                                Email</th>

                            <th scope="col" class="relative py-3.5 text-right pl-3 pr-4 sm:pr-6 w-1/6">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @if ($users->count() === 0)
                            <tr>
                                <td colspan="5" class="text-center py-4 text-sm text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 w-1/6">
                                        {{ $user->name }} {{ $user->surname }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 w-3/6">{{ $user->email }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-6 w-1/6">
                                        <div class="flex justify-end space-x-3">
                                            @if ($user->id !== auth()->user()->id)
                                                <button wire:click="$dispatch('open-edit-user-modal', { user: {{ $user }} })"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                                <button wire:click="$set('deleteUserId', {{ $user->id }})"
                                                    x-on:click="$dispatch('open-delete-user-modal')"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>