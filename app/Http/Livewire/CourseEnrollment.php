<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CourseEnrollment extends Component
{
    public $course;
    public $enrolled = false;
    
    public function mount(Course $course)
    {
        $this->course = $course;
        
        if (Auth::check()) {
            $this->enrolled = Auth::user()->enrolledCourses()->where('course_id', $this->course->id)->exists();
        }
    }
    
    public function enroll()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Check if already enrolled
        if ($this->enrolled) {
            session()->flash('error', 'You are already enrolled in this course.');
            return;
        }
        
        // Create enrollment
        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $this->course->id,
            'status' => 'active',
            'enrolled_at' => now(),
            'progress' => 0,
        ]);
        
        $this->enrolled = true;
        
        session()->flash('success', 'Successfully enrolled in the course!');
    }
    
    public function render()
    {
        return view('livewire.course-enrollment');
    }
}
