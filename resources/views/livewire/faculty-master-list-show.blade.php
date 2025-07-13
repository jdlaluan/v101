<div>
    <!-- Main Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Course Code</th>
                    <th scope="col" class="px-6 py-8">Course Name</th>
                    <th scope="col" class="px-6 py-8">Students Enrolled</th>
                    <th scope="col" class="px-6 py-8">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">{{ $course['code'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $course['name'] }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">{{ $course['count'] }}</td>
                        <td class="px-6 py-3">
                            <flux:button size="sm" wire:click="viewStudents({{ $course['id'] }})">
                                View Students
                            </flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Students Modal -->
    @if($showStudentModal)
        <flux:modal wire:model="showStudentModal" class="min-w-[50rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">
                        Enrolled Students for {{ $courses->firstWhere('id', $selectedCourseId)['name'] ?? '' }}
                    </flux:heading>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Student Name</th>
                                <th class="px-6 py-3">Cooperating Agency</th>
                                <th class="px-6 py-3">Faculty Advisor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enrolledStudents as $enrollment)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $enrollment->student->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $enrollment->agency->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $enrollment->faculty->name ?? 'N/A' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center">No students enrolled</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-end gap-2">
                    <flux:button variant="ghost" wire:click="closeModal">Close</flux:button>
                </div>
            </div>
        </flux:modal>
    @endif
</div>
