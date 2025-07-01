<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index(Request $request)
    {
        $categories = CourseCategory::orderBy('name')->get();
        $courses = Course::with(['category', 'instructor'])
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
            
        return view('courses.index', compact('courses', 'categories'));
    }

    /**
     * Display the specified course.
     */
    public function show(Course $course)
    {
        $course->load(['category', 'instructor', 'lessons', 'assignments']);
        
        // Check if user is enrolled
        $enrolled = false;
        if (auth()->check()) {
            $enrolled = auth()->user()->enrolledCourses()->where('course_id', $course->id)->exists();
        }
        
        // Get related courses
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('is_published', true)
            ->limit(3)
            ->get();
            
        return view('courses.show', compact('course', 'enrolled', 'relatedCourses'));
    }
}
