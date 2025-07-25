<div>
    <flux:modal name="create-post" class="md:w-200">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Semester Grading</flux:heading>
                <flux:text class="mt-2">Add details for the post. changes to the semester grading.</flux:text>
            </div>

            <flux:input wire:model="grading_codes" label="Semester Grading Code" placeholder="Grading code" />

            <flux:textarea wire:model="grading_description" label="Semester Grading Description" placeholder="Description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="submit">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
