<div>
    <flux:modal name="edit-post" class="md:w-200">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Semester Course</flux:heading>
                <flux:text class="mt-2">Edit details for the post. changes to the semester Course Code.</flux:text>
            </div>

            <flux:input wire:model="course_code" label="Semester Course Code" placeholder="Course code" />

            <flux:textarea wire:model="course_name" label="Semester Course Description" placeholder="Description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update">Edit changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
