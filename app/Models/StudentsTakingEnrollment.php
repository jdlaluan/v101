<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class StudentsTakingEnrollment extends Model
// {
//     //
// }



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class StudentsTakingEnrollment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students_taking_enrollment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'course_grade_id',
        'agency_id',
        'faculty_id',
        'enrollment_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enrollment_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'formatted_enrollment_date',
    ];

    /**
     * Get the student associated with the enrollment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault([
            'name' => 'Deleted User',
        ]);
    }

    /**
     * Get the course associated with the enrollment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(CourseGrading::class, 'course_grade_id')->withDefault([
            'course_name' => 'Deleted Course',
            'course_code' => 'N/A',
        ]);
    }

    /**
     * Get the agency associated with the enrollment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agency_id')->withDefault([
            'name' => 'Deleted Agency',
        ]);
    }

    /**
     * Get the faculty associated with the enrollment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(User::class, 'faculty_id')->withDefault([
            'name' => 'Deleted Faculty',
        ]);
    }

    /**
     * Get formatted enrollment date attribute.
     *
     * @return string
     */
    public function getFormattedEnrollmentDateAttribute(): string
    {
        return $this->enrollment_date
            ? Carbon::parse($this->enrollment_date)->format('M d, Y h:i A')
            : 'Not available';
    }

    /**
     * Scope a query to only include enrollments for a specific student.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForStudent($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope a query to only include enrollments for a specific agency.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $agencyId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForAgency($query, $agencyId)
    {
        return $query->where('agency_id', $agencyId);
    }

    /**
     * Scope a query to only include enrollments for a specific faculty.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $facultyId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForFaculty($query, $facultyId)
    {
        return $query->where('faculty_id', $facultyId);
    }

    /**
     * Scope a query to only include enrollments for a specific course.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $courseId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForCourse($query, $courseId)
    {
        return $query->where('course_grade_id', $courseId);
    }
}
