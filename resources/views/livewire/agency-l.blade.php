<div>
    {{-- <flux:modal.trigger name="create-post">
        <flux:button>Add New</flux:button>
    </flux:modal.trigger> --}}

    {{-- <livewire:estudent-create /> --}}
    <livewire:agency-edit />

    <flux:modal name="delete-post" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Item?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this item.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger" wire:click="destroy()">Delete Item</flux:button>
            </div>
        </div>
    </flux:modal>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Id</th>
                    <th scope="col" class="px-6 py-8">Agency</th>
                    <th scope="col" class="px-6 py-8">Email</th>
                    <th scope="col" class="px-6 py-8">Role</th>
                    <th scope="col" class="px-6 py-8">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">{{$post->id}}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{$post->name}}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{$post->email}}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{$post->role->value ?? 'N/A'}}</td> {{-- Add this line to display the role --}}

                        <td class="px-6 py-3">
                            <flux:button size="sm" wire:click="edit({{$post->id}})">Edit</flux:button>
                            <flux:button size="sm" variant="danger" wire:click="delete({{$post->id}})">Delete</flux:button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
