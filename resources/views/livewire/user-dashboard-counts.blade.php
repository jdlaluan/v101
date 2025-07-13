<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex justify-between gap-4 p-4">
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
            <h2 class="text-lg font-bold">Total Tasks Given</h2>
            <p class="text-2xl font-semibold">{{ $totalTasksGiven }}</p>
        </div>
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
            <h2 class="text-lg font-bold">Pending Tasks</h2>
            <p class="text-2xl font-semibold">{{ $pendingTasksCount }}</p>
        </div>
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg text-center flex-1 min-w-[200px]">
            <h2 class="text-lg font-bold">Task Submitted</h2>
            <p class="text-2xl font-semibold">{{ $submittedTasksCount}}</p>
        </div>
    </div>
</div>
