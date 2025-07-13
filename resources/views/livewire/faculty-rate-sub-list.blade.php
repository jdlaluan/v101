<div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Deadline</th>
                    <th scope="col" class="px-6 py-8">Task Name</th>
                    <th scope="col" class="px-6 py-8">Submitted Work</th>
                    <th scope="col" class="px-6 py-8">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $submission)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $submission['deadline'] }}
                        </td>
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                            {{ $submission['task_name'] }}
                        </td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $submission['submitted_work'] }}
                        </td>
                        <td class="px-6 py-3">
                            @if($submission['is_rated'])
                                <span class="text-green-500">Rated: {{ $submission['current_score'] }}/100</span>
                            @else
                                <flux:button size="sm" wire:click="showRatingModal({{ $submission['id'] }})">
                                    Score
                                </flux:button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Rating Modal -->
    <flux:modal wire:model="showRatingModal" class="min-w-[50rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Rate Submission</flux:heading>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <flux:text class="font-semibold">Task Name:</flux:text>
                    <flux:text>{{ $selectedSubmission['task_name'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Submitted Work:</flux:text>
                    <flux:text>{{ $selectedSubmission['submitted_work'] ?? '' }}</flux:text>
                </div>
                <div>
                    <flux:text class="font-semibold">Student:</flux:text>
                    <flux:text>{{ $selectedSubmission['student_name'] ?? '' }}</flux:text>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Score (0-100)</label>
                    <flux:input type="number" wire:model="score" min="0" max="100" />
                    @error('score') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <flux:textarea wire:model="comments" label="Comments (Optional)" placeholder="Add any feedback comments" />
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <flux:button variant="ghost" wire:click="showRatingModal = false">Cancel</flux:button>
                <flux:button variant="primary" wire:click="rateSubmission">Save Rating</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
