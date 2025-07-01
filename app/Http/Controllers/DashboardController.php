<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get enrolled courses for students
        $enrolledCourses = collect();
        if ($user->hasRole('student')) {
            $enrolledCourses = $user->enrolledCourses()
                ->with(['category', 'instructor'])
                ->orderBy('pivot_enrolled_at', 'desc')
                ->take(5)
                ->get();
        }
        
        // Get taught courses for teachers
        $taughtCourses = collect();
        if ($user->hasRole('teacher')) {
            $taughtCourses = $user->taughtCourses()
                ->with(['category'])
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        }
        
        // Get upcoming events
        $upcomingEvents = Event::where('start_date', '>=', now())
            ->where('is_published', true)
            ->orderBy('start_date')
            ->take(3)
            ->get();
            
        // Get recent blog posts
        $recentPosts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        // Get stats for admin
        $stats = [];
        if ($user->hasRole('admin')) {
            $stats = [
                'students' => User::role('student')->count(),
                'teachers' => User::role('teacher')->count(),
                'courses' => Course::count(),
                'events' => Event::count(),
            ];
        }
        
        return view('dashboard.index', compact(
            'user', 
            'enrolledCourses', 
            'taughtCourses', 
            'upcomingEvents', 
            'recentPosts',
            'stats'
        ));
    }
    
    /**
     * Show enrolled courses for student.
     */
    public function enrolledCourses()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('student')) {
            return redirect()->route('dashboard');
        }
        
        $enrolledCourses = $user->enrolledCourses()
            ->with(['category', 'instructor'])
            ->orderBy('pivot_enrolled_at', 'desc')
            ->paginate(9);
            
        return view('dashboard.courses.enrolled', compact('enrolledCourses'));
    }
    
    /**
     * Show taught courses for teacher.
     */
    public function taughtCourses()
    {
        $user = Auth::user();
        
        if (!$user->hasRole('teacher')) {
            return redirect()->route('dashboard');
        }
        
        $taughtCourses = $user->taughtCourses()
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
            
        return view('dashboard.courses.taught', compact('taughtCourses'));
    }
    
    /**
     * Show course details for enrolled student.
     */
    public function showEnrolledCourse(Course $course)
    {
        $user = Auth::user();
        
        // Check if student is enrolled
        $enrollment = $user->enrolledCourses()
            ->where('course_id', $course->id)
            ->first();
            
        if (!$enrollment) {
            return redirect()->route('dashboard');
        }
        
        $course->load(['category', 'instructor', 'lessons', 'assignments']);
        
        return view('dashboard.courses.show', compact('course', 'enrollment'));
    }
}
