<x-layouts.app :title="__('Reports')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative mb-6 w-full">
                <flux:heading size="xl" level="1">{{ __('Reports') }}</flux:heading>
                <flux:subheading size="lg" class="mb-6">{{ __('Manage the data reports.') }}</flux:subheading>
                <flux:separator variant="subtle" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
                <div class="flex justify-between gap-4 p-4">
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
                        <h2 class="text-lg font-bold">Students</h2>
                        <p class="text-2xl font-semibold">3</p>
                    </div>
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
                        <h2 class="text-lg font-bold">Agency</h2>
                        <p class="text-2xl font-semibold">102</p>
                    </div>
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
                        <h2 class="text-lg font-bold">Faculty</h2>
                        <p class="text-2xl font-semibold">200</p>
                    </div>
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
                        <h2 class="text-lg font-bold">Human</h2>
                        <p class="text-2xl font-semibold">300</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
