<div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Student Name</th>
                    <th scope="col" class="px-6 py-8">Course Code</th>
                    <th scope="col" class="px-6 py-8">Course Name</th>
                    <th scope="col" class="px-6 py-8">Tasks Assigned</th>
                    <th scope="col" class="px-6 py-8">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">{{ $student['name'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $student['course_code'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $student['course_name'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $student['tasks_count'] }}</td>
                        <td class="px-6 py-3">
                            <flux:button size="sm" wire:click="showAddTaskModal({{ $student['id'] }})">
                                Add Task
                            </flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Task Modal -->
    <flux:modal wire:model="showTaskModal" class="min-w-[50rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add New Task</flux:heading>
                <flux:subheading size="lg" class="mb-6">Add task to the students offbeat test test. what is it.</flux:subheading>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <flux:input wire:model="task_name" label="Task Name" placeholder="Enter task name" />
                    @error('task_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <flux:textarea wire:model="task_description" label="Task Description" placeholder="Enter task description" />
                    @error('task_description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <flux:input type="date" wire:model="deadline" label="Deadline" />
                    @error('deadline') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Semester Grading</label>
                    <flux:dropdown class="w-full">
                        <flux:button icon:trailing="chevron-down" class="w-full justify-between">
                            @php
                                $selectedGrading = $gradingOptions->firstWhere('id', $grading_code_id);
                            @endphp
                            @if($selectedGrading)
                                {{ $selectedGrading->grading_code }}
                            @else
                                Select Grading Option
                            @endif
                        </flux:button>
                        <flux:menu>
                            @foreach($gradingOptions as $option)
                                <flux:menu.item wire:click="$set('grading_code_id', {{ $option->id }})">
                                    {{ $option->grading_code }} - {{ $option->grading_description }}
                                </flux:menu.item>
                            @endforeach
                        </flux:menu>
                    </flux:dropdown>
                    @error('grading_code_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="resetForm(); showTaskModal = false">Cancel</flux:button>
                <flux:button variant="primary" wire:click="addTask">Save Task</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
