<div>
    <flux:modal name="edit-post" class="md:w-200">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Faculty Credentials.</flux:heading>
                <flux:text class="mt-2">Edit details for the post. changes to the Faculty Credentials.</flux:text>
            </div>

            <flux:input wire:model="name" label="Change Full Name" placeholder="Full name" />

            <flux:textarea wire:model="email" label="Change Email Address" placeholder="Email Address" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update">Edit changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
