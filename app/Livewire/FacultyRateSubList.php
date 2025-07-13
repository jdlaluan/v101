<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FacultyTaskInfo;
use App\Models\StudentSubmittedTask;
use App\Models\Rating;
use Livewire\Attributes\On;



class FacultyRateSubList extends Component
{
    public $submissions = [];
    public $showRatingModal = false;
    public $selectedSubmission = null;
    public $score = 0;
    public $comments = '';

    public function mount()
    {
        $this->loadSubmissions();
    }

    public function loadSubmissions()
    {
        $facultyId = auth()->id();

        $this->submissions = StudentSubmittedTask::with([
                'task.faculty',
                'student',
                'rating' // This now works because we defined the relationship
            ])
            ->whereHas('task', function($query) use ($facultyId) {
                $query->where('faculty_id', $facultyId);
            })
            ->get()
            ->map(function ($submission) {
                return [
                    'id' => $submission->id,
                    'deadline' => $submission->task->deadline,
                    'task_name' => $submission->task->task_name,
                    'submitted_work' => basename($submission->file_path),
                    'student_name' => $submission->student->name,
                    'is_rated' => $submission->rating !== null,
                    'current_score' => $submission->rating?->score
                ];
            });
    }

    public function showRatingModal($submissionId)
    {
        $submission = StudentSubmittedTask::with(['task', 'student', 'rating'])
            ->find($submissionId);

        if (!$submission) {
            return;
        }

        $this->selectedSubmission = [
            'id' => $submission->id,
            'task_name' => $submission->task->task_name,
            'submitted_work' => basename($submission->file_path),
            'student_name' => $submission->student->name,
            'current_score' => $submission->rating?->score
        ];

        $this->score = $submission->rating?->score ?? 0;
        $this->comments = $submission->rating?->comments ?? '';
        $this->showRatingModal = true;
    }

    public function rateSubmission()
    {
        $this->validate([
            'score' => 'required|integer|min:0|max:100',
            'comments' => 'nullable|string|max:500'
        ]);

        $submission = StudentSubmittedTask::find($this->selectedSubmission['id']);

        Rating::updateOrCreate(
            [
                'submission_id' => $submission->id
            ],
            [
                'faculty_id' => auth()->id(),
                'student_id' => $submission->student_id,
                'task_id' => $submission->task_id,
                'score' => $this->score,
                'comments' => $this->comments
            ]
        );

        $this->reset(['score', 'comments', 'showRatingModal']);
        $this->loadSubmissions();
    }

    public function render()
    {
        return view('livewire.faculty-rate-sub-list');
    }
}
