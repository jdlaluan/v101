<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FacultyTaskInfo;
use App\Models\StudentSubmittedTask;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class ViewUserScores extends Component
{
    use WithFileUploads;

    public $tasks = [];
    public $selectedTask = null;
    public $submission = null;
    public $showSubmissionModal = false;
    public $showSubmitModal = false;
    public $file;
    public $comments = '';

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = FacultyTaskInfo::with(['faculty', 'grading'])
            ->where('student_id', auth()->id())
            ->get()
            ->map(function ($task) {
                $submission = StudentSubmittedTask::where('task_id', $task->id)
                    ->where('student_id', auth()->id())
                    ->first();

                return [
                    'id' => $task->id,
                    'task_name' => $task->task_name,
                    'description' => $task->task_description,
                    'deadline' => $task->deadline,
                    'semester_code' => $task->grading->grading_code ?? 'N/A',
                    'submitted_to' => $task->faculty->name,
                    'has_submission' => $submission !== null,
                    'submission' => $submission
                ];
            });
    }

    public function viewSubmission($taskId)
    {
        $this->selectedTask = collect($this->tasks)->firstWhere('id', $taskId);
        $this->submission = $this->selectedTask['submission'];
        $this->showSubmissionModal = true;
    }

    public function showSubmitForm($taskId)
    {
        $this->selectedTask = collect($this->tasks)->firstWhere('id', $taskId);
        $this->showSubmitModal = true;
    }

    public function submitTask()
    {
        $this->validate([
            'file' => 'required|file|mimes:pdf|max:10240',
            'comments' => 'nullable|string|max:500'
        ]);

        $filePath = $this->file->store('student-submissions');

        StudentSubmittedTask::create([
            'task_id' => $this->selectedTask['id'],
            'student_id' => auth()->id(),
            'file_path' => $filePath,
            'comments' => $this->comments
        ]);

        $this->reset(['file', 'comments', 'showSubmitModal']);
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.view-user-scores');
    }
}
