<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    {{-- <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item> --}}

                    {{-- @if (auth()->user()->role === App\Enums\UserRole::Admin)
                        <flux:navlist.item icon="home" :href="route('admin.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                        <flux:navlist.item icon="list-bullet" :href="route('admin.test1')" wire:navigate>{{ __('Records') }}</flux:navlist.item>
                        <flux:navlist.item icon="queue-list" :href="route('admin.test2')" wire:navigate>{{ __('Enrollment') }}</flux:navlist.item>
                        <flux:navlist.item icon="clipboard-document-list" :href="route('admin.test3')" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                        <flux:navlist.item icon="building-storefront" :href="route('admin.test4')" wire:navigate>{{ __('Activity Log') }}</flux:navlist.item>
                    @endif --}}

                    @if (auth()->user()->role === App\Enums\UserRole::Admin)
                        <flux:navlist.item icon="home" :href="route('admin.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>

                        <flux:navlist.group :heading="__('Records')">
                            <flux:navlist.item icon="calendar-days" :href="route('admin.records.semester-grading')" wire:navigate>{{ __('Semester/Grading') }}</flux:navlist.item>
                            <flux:navlist.item icon="book-open" :href="route('admin.records.course-grade-level')" wire:navigate>{{ __('Course/Grade Level') }}</flux:navlist.item>
                            <flux:navlist.item icon="users" :href="route('admin.records.faculty')" wire:navigate>{{ __('Faculty') }}</flux:navlist.item>
                            <flux:navlist.item icon="user-group" :href="route('admin.records.student')" wire:navigate>{{ __('Student') }}</flux:navlist.item>
                            <flux:navlist.item icon="building-office" :href="route('admin.records.cooperating-agency')" wire:navigate>{{ __('Cooperating Agency') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="queue-list" :href="route('admin.test2')" wire:navigate>{{ __('Enrollment') }}</flux:navlist.item> --}}

                        <flux:navlist.group :heading="__('Enrollment')">
                            {{-- <flux:navlist.item icon="calendar-days" :href="route('admin.enrollment.enrollment-form')" wire:navigate>{{ __('Enrollment Form') }}</flux:navlist.item> --}}
                            <flux:navlist.item icon="book-open" :href="route('admin.enrollment.list-enrolled')" wire:navigate>{{ __('List of Enrolled Students') }}</flux:navlist.item>
                        </flux:navlist.group>


                        <flux:navlist.group :heading="__('Reports')">
                            <flux:navlist.item icon="clipboard-document-list" :href="route('admin.test3')" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                            {{-- <flux:navlist.item icon="building-storefront" :href="route('admin.test4')" wire:navigate>{{ __('Activity Log') }}</flux:navlist.item> --}}
                        </flux:navlist.group>

                        {{-- safeeee --}}
                        {{-- <flux:navlist.item icon="clipboard-document-list" :href="route('admin.test3')" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                        <flux:navlist.item icon="building-storefront" :href="route('admin.test4')" wire:navigate>{{ __('Activity Log') }}</flux:navlist.item> --}}
                    @endif



                    @if (auth()->user()->role === App\Enums\UserRole::Faculty)
                        <flux:navlist.item icon="home" :href="route('faculty.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>

                        {{-- <flux:navlist.item icon="list-bullet" :href="route('faculty.test1')" wire:navigate>{{ __('Masterlist') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('Masterlist')">
                            <flux:navlist.item icon="list-bullet" :href="route('faculty.test1')" wire:navigate>{{ __('Masterlist') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="queue-list" :href="route('faculty.test2')" wire:navigate>{{ __('Task Information') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('Information')">
                            <flux:navlist.item icon="queue-list" :href="route('faculty.test2')" wire:navigate>{{ __('Task Information') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="clipboard-document-list" :href="route('faculty.test3')" wire:navigate>{{ __('Rate Submission') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('Submission')">
                            <flux:navlist.item icon="clipboard-document-list" :href="route('faculty.test3')" wire:navigate>{{ __('Rate Submission') }}</flux:navlist.item>
                        </flux:navlist.group>
                    @endif






                    @if (auth()->user()->role === App\Enums\UserRole::Agency)
                        <flux:navlist.item icon="list-bullet" :href="route('agency.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>

                        {{-- <flux:navlist.item icon="list-bullet" :href="route('agency.test1')" wire:navigate>{{ __('Agency Test1') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('View Semester')">
                            <flux:navlist.item icon="list-bullet" :href="route('agency.test1')" wire:navigate>{{ __('View Semester') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="queue-list" :href="route('agency.test2')" wire:navigate>{{ __('Agency Test2') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('Student List')">
                            <flux:navlist.item icon="queue-list" :href="route('agency.test2')" wire:navigate>{{ __('Student List') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="clipboard-document-list" :href="route('agency.test3')" wire:navigate>{{ __('Agency Test3') }}</flux:navlist.item> --}}
                    @endif



                    @if (auth()->user()->role === App\Enums\UserRole::User)
                        {{-- <flux:navlist.item icon="home" :href="route('user.dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item> --}}
                        <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>

                        {{-- <flux:navlist.item icon="list-bullet" :href="route('test1')" wire:navigate>{{ __('User Test1') }}</flux:navlist.item> --}}
                        {{-- <flux:navlist.group :heading="__('Task View')">
                            <flux:navlist.item icon="list-bullet" :href="route('test1')" wire:navigate>{{ __('View Task') }}</flux:navlist.item>
                        </flux:navlist.group> --}}

                        <flux:navlist.group :heading="__('Enroll')">
                            <flux:navlist.item icon="list-bullet" :href="route('test1')" wire:navigate>{{ __('Enrollment') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="queue-list" :href="route('test2')" wire:navigate>{{ __('User Test2') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('Task View')">
                            <flux:navlist.item icon="queue-list" :href="route('test2')" wire:navigate>{{ __('Task View') }}</flux:navlist.item>
                        </flux:navlist.group>

                        {{-- <flux:navlist.item icon="clipboard-document-list" :href="route('test3')" wire:navigate>{{ __('User Test3') }}</flux:navlist.item> --}}
                        <flux:navlist.group :heading="__('Faculty Rating')">
                            <flux:navlist.item icon="clipboard-document-list" :href="route('test3')" wire:navigate>{{ __('Faculty Rating') }}</flux:navlist.item>
                        </flux:navlist.group>

                    @endif

                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
