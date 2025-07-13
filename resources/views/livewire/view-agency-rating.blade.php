<div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-8">Faculty Name</th>
                    <th scope="col" class="px-6 py-8">Faculty Ratings</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                            {{ $faculty['name'] }}
                        </td>
                        <td class="px-6 py-3 text-gray-600 dark:text-gray-300">
                            {{ $faculty['rating'] ?? 'Not rated yet' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
