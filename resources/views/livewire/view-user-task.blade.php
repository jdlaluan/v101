<div>
    <flux:modal.trigger name="create-post">
        <flux:button>Add New</flux:button>
    </flux:modal.trigger>

    <livewire:enroll-user />

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Student Name</th>
                    <th scope="col" class="px-6 py-8">Course</th>
                    <th scope="col" class="px-6 py-8">Faculty</th>
                    <th scope="col" class="px-6 py-8">Agency Name</th>
                    <th scope="col" class="px-6 py-8">Semester</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enrollments as $enrollment)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">{{ $enrollment->full_name }}</td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $enrollment->course->course_code }} - {{ $enrollment->course->course_name }}
                        </td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $enrollment->faculty->name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $enrollment->agency->name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $enrollment->enrollment_date->format('M Y') ?? 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
