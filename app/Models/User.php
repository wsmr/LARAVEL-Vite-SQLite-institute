<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
        'bio',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'emergency_contact',
        'qualification',
        'specialization',
        'parent_name',
        'parent_email',
        'parent_phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_of_birth' => 'date',
    ];

    /**
     * Get the courses taught by the user (as instructor).
     */
    public function taughtCourses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    /**
     * Get the courses enrolled by the user (as student).
     */
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('status', 'enrolled_at', 'completed_at', 'progress')
            ->withTimestamps();
    }

    /**
     * Get the assignments created by the user (as instructor).
     */
    public function createdAssignments()
    {
        return $this->hasMany(Assignment::class, 'instructor_id');
    }

    /**
     * Get the submissions made by the user (as student).
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

    /**
     * Get the blog posts authored by the user.
     */
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class, 'author_id');
    }

    /**
     * Get the events created by the user.
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'created_by');
    }

    /**
     * Check if user is a student.
     */
    public function isStudent()
    {
        return $this->hasRole('student');
    }

    /**
     * Check if user is a teacher.
     */
    public function isTeacher()
    {
        return $this->hasRole('teacher');
    }

    /**
     * Check if user is a parent.
     */
    public function isParent()
    {
        return $this->hasRole('parent');
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
