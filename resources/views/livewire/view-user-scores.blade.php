<div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Task Name</th>
                    <th scope="col" class="px-6 py-8">Description</th>
                    <th scope="col" class="px-6 py-8">Deadline</th>
                    <th scope="col" class="px-6 py-8">Semester Code</th>
                    <th scope="col" class="px-6 py-8">Submitted to</th>
                    <th scope="col" class="px-6 py-8">Status</th>
                    <th scope="col" class="px-6 py-8">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">{{ $task['task_name'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $task['description'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $task['deadline'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $task['semester_code'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $task['submitted_to'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            @if($task['has_submission'])
                                <span class="text-green-500">Submitted</span>
                            @else
                                <span class="text-red-500">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            @if($task['has_submission'])
                                <flux:button size="sm" wire:click="viewSubmission({{ $task['id'] }})">
                                    View Submission
                                </flux:button>
                            @else
                                <flux:button size="sm" variant="primary" wire:click="showSubmitForm({{ $task['id'] }})">
                                    Submit Requirement
                                </flux:button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- View Submission Modal -->
    <flux:modal wire:model="showSubmissionModal" class="min-w-[50rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Submission Details</flux:heading>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <flux:text class="font-semibold">Task Name:</flux:text>
                    <flux:text>{{ $selectedTask['task_name'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Description:</flux:text>
                    <flux:text>{{ $selectedTask['description'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Deadline:</flux:text>
                    <flux:text>{{ $selectedTask['deadline'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Semester Code:</flux:text>
                    <flux:text>{{ $selectedTask['semester_code'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Submitted To:</flux:text>
                    <flux:text>{{ $selectedTask['submitted_to'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Submission File:</flux:text>
                    <a href="{{ asset('storage/' . ($submission->file_path ?? '')) }}"
                       target="_blank"
                       class="text-blue-500 hover:underline">
                        Download PDF
                    </a>
                </div>
                @if($submission?->comments)
                <div>
                    <flux:text class="font-semibold">Comments:</flux:text>
                    <flux:text>{{ $submission->comments }}</flux:text>
                </div>
                @endif
            </div>

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="showSubmissionModal = false">Close</flux:button>
            </div>
        </div>
    </flux:modal>

    <!-- Submit Requirement Modal -->
    <flux:modal wire:model="showSubmitModal" class="min-w-[50rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Submit Requirement</flux:heading>
                <flux:subheading size="lg" class="mb-6">Test mic. you must submit your task before he gets angry t you.</flux:subheading>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <flux:input wire:model="selectedTask.task_name" label="Task Name" disabled />
                </div>
                <div>
                    <flux:textarea wire:model="selectedTask.description" label="Description" disabled />
                </div>
                <div>
                    <flux:input wire:model="selectedTask.deadline" label="Deadline" disabled />
                </div>
                <div>
                    <flux:input wire:model="selectedTask.semester_code" label="Semester Code" disabled />
                </div>
                <div>
                    <flux:input wire:model="selectedTask.submitted_to" label="Submitted To" disabled />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload PDF</label>
                    <input type="file" wire:model="file" accept=".pdf" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <flux:textarea wire:model="comments" label="Comments (Optional)" placeholder="Add any additional comments" />
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="showSubmitModal = false">Cancel</flux:button>
                <flux:button variant="primary" wire:click="submitTask">Submit</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
