<x-layouts.app :title="__('Task View')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative mb-6 w-full">
                <flux:heading size="xl" level="1">{{ __('Task View') }}</flux:heading>
                <flux:subheading size="lg" class="mb-6">{{ __('Manage the user data modules.') }}</flux:subheading>
                <flux:separator variant="subtle" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
           <livewire:view-user-scores />
        </div>
    </div>
</x-layouts.app>
