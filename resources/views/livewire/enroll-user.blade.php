<div>
    <flux:modal name="create-post" class="md:w-200">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Enroll Yourself</flux:heading>
                <flux:text class="mt-2">
                    Please select your course, cooperating agency, and faculty advisor.
                </flux:text>
            </div>

            <!-- Display success/error messages -->
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form Container -->
            <div class="flex flex-col space-y-4 w-full md:w-1/2">

                <!-- Student Name (Disabled) -->
                <flux:input wire:model="name" label="Your Name" placeholder="Student Name" disabled />

                <!-- Course Dropdown -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Course</label>
                    <flux:dropdown class="w-full">
                        <flux:button icon:trailing="chevron-down" class="w-full justify-between">
                            @isset($courses[$course])
                                {{ $courses[$course] }}
                            @else
                                Select Course
                            @endisset
                        </flux:button>
                        <flux:menu>
                            <flux:menu.radio.group wire:model="course">
                                @foreach($courses as $id => $name)
                                    <flux:menu.radio value="{{ $id }}">{{ $name }}</flux:menu.radio>
                                @endforeach
                            </flux:menu.radio.group>
                        </flux:menu>
                    </flux:dropdown>
                    @error('course') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Cooperating Agency Dropdown -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cooperating Agency</label>
                    <flux:dropdown class="w-full">
                        <flux:button icon:trailing="chevron-down" class="w-full justify-between">
                            @isset($agencies[$agency])
                                {{ $agencies[$agency] }}
                            @else
                                Select Agency
                            @endisset
                        </flux:button>
                        <flux:menu>
                            <flux:menu.radio.group wire:model="agency">
                                @foreach($agencies as $id => $name)
                                    <flux:menu.radio value="{{ $id }}">{{ $name }}</flux:menu.radio>
                                @endforeach
                            </flux:menu.radio.group>
                        </flux:menu>
                    </flux:dropdown>
                    @error('agency') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Faculty Dropdown -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Faculty Advisor</label>
                    <flux:dropdown class="w-full">
                        <flux:button icon:trailing="chevron-down" class="w-full justify-between">
                            @isset($faculties[$faculty])
                                {{ $faculties[$faculty] }}
                            @else
                                Select Faculty
                            @endisset
                        </flux:button>
                        <flux:menu>
                            <flux:menu.radio.group wire:model="faculty">
                                @foreach($faculties as $id => $name)
                                    <flux:menu.radio value="{{ $id }}">{{ $name }}</flux:menu.radio>
                                @endforeach
                            </flux:menu.radio.group>
                        </flux:menu>
                    </flux:dropdown>
                    @error('faculty') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>



            <!-- Submit Button -->
            <div class="flex justify-center mt-8">
                <flux:button type="button" variant="primary" wire:click="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove>Submit Enrollment</span>
                    <span wire:loading>Processing...</span>
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>


