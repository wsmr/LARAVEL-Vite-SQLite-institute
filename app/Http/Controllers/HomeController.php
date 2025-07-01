<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Event;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Get featured courses
        $featuredCourses = Course::where('is_featured', true)
            ->where('is_published', true)
            ->with(['category', 'instructor', 'lessons'])
            ->take(3)
            ->get();
            
        // Get upcoming events
        $upcomingEvents = Event::where('start_date', '>=', now())
            ->where('is_published', true)
            ->orderBy('start_date')
            ->take(2)
            ->get();
            
        return view('welcome', compact('featuredCourses', 'upcomingEvents'));
    }
    
    /**
     * Display the about page.
     */
    public function about()
    {
        // Get teacher count
        $teacherCount = User::role('teacher')->count();
        
        // Get student count
        $studentCount = User::role('student')->count();
        
        // Get course count
        $courseCount = Course::where('is_published', true)->count();
        
        return view('about', compact('teacherCount', 'studentCount', 'courseCount'));
    }
    
    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }
    
    /**
     * Store a new contact message.
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        $contact = \App\Models\Contact::create($validated);
        
        return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you soon.');
    }
    
    /**
     * Display the blog page.
     */
    public function blog()
    {
        $posts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(6);
            
        return view('blog.index', compact('posts'));
    }
    
    /**
     * Display a single blog post.
     */
    public function showPost(BlogPost $post)
    {
        if (!$post->is_published || $post->published_at > now()) {
            abort(404);
        }
        
        $post->load('author');
        
        // Get related posts
        $relatedPosts = BlogPost::where('id', '!=', $post->id)
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->take(3)
            ->get();
            
        return view('blog.show', compact('post', 'relatedPosts'));
    }
    
    /**
     * Display the events page.
     */
    public function events()
    {
        $events = Event::where('is_published', true)
            ->where('end_date', '>=', now())
            ->orderBy('start_date')
            ->paginate(6);
            
        return view('events.index', compact('events'));
    }
    
    /**
     * Display a single event.
     */
    public function showEvent(Event $event)
    {
        if (!$event->is_published) {
            abort(404);
        }
        
        $event->load('creator');
        
        return view('events.show', compact('event'));
    }
}
