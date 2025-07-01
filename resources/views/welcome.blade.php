@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1>Welcome to Diyawanna Institute of Education</h1>
                <p class="lead">High-quality education, tuition, and skill development for academic excellence</p>
                <div class="mt-5">
                    <a href="{{ route('courses.index') }}" class="btn btn-accent btn-lg me-3">Browse Courses</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Join Today</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section bg-white">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>Why Choose Diyawanna Institute?</h2>
                <p class="lead text-muted">We provide exceptional educational experiences through our commitment to excellence</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Expert Instructors</h4>
                    <p>Learn from industry professionals and experienced educators dedicated to your success.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <i class="fas fa-laptop"></i>
                    <h4>Online Learning</h4>
                    <p>Access course materials, video lessons, and assignments from anywhere, anytime.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box">
                    <i class="fas fa-certificate"></i>
                    <h4>Recognized Certification</h4>
                    <p>Earn certificates that are valued by employers and educational institutions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <h2>Featured Courses</h2>
                <p class="lead text-muted">Explore our most popular educational offerings</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('courses.index') }}" class="btn btn-primary">View All Courses</a>
            </div>
        </div>
        <div class="row">
            <!-- Course cards will be dynamically generated here -->
            @foreach($featuredCourses ?? [] as $course)
            <div class="col-md-4 mb-4">
                <div class="card course-card h-100">
                    @if($course->is_featured)
                    <span class="badge bg-accent">Featured</span>
                    @endif
                    <img src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="{{ $course->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="text-muted">{{ $course->lessons->count() }} lessons</span>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- Placeholder cards if no courses are available -->
            @if(empty($featuredCourses) || count($featuredCourses) === 0)
            <div class="col-md-4 mb-4">
                <div class="card course-card h-100">
                    <span class="badge bg-accent">Featured</span>
                    <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="Mathematics">
                    <div class="card-body">
                        <h5 class="card-title">Advanced Mathematics</h5>
                        <p class="card-text">Master complex mathematical concepts with our comprehensive course designed for excellence.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="text-muted">12 lessons</span>
                        <a href="#" class="btn btn-sm btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card course-card h-100">
                    <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="Science">
                    <div class="card-body">
                        <h5 class="card-title">Physics for Beginners</h5>
                        <p class="card-text">Explore the fundamental principles of physics through interactive lessons and experiments.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="text-muted">10 lessons</span>
                        <a href="#" class="btn btn-sm btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card course-card h-100">
                    <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="English">
                    <div class="card-body">
                        <h5 class="card-title">English Literature</h5>
                        <p class="card-text">Develop critical analysis skills through the study of classic and contemporary literature.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="text-muted">8 lessons</span>
                        <a href="#" class="btn btn-sm btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2>What Our Students Say</h2>
                <p class="lead text-muted">Hear from our community of learners</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <img src="{{ asset('images/testimonial-placeholder.jpg') }}" alt="Student">
                    <p class="testimonial-text">"The quality of education at Diyawanna Institute is exceptional. The teachers are knowledgeable and supportive."</p>
                    <h5>Amara Perera</h5>
                    <p class="text-muted">Mathematics Student</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <img src="{{ asset('images/testimonial-placeholder.jpg') }}" alt="Student">
                    <p class="testimonial-text">"I've significantly improved my grades since joining. The online resources are particularly helpful for revision."</p>
                    <h5>Dinesh Fernando</h5>
                    <p class="text-muted">Science Student</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <img src="{{ asset('images/testimonial-placeholder.jpg') }}" alt="Student">
                    <p class="testimonial-text">"As a parent, I'm impressed with the progress my child has made. The teachers truly care about student success."</p>
                    <h5>Kumari Silva</h5>
                    <p class="text-muted">Parent</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="text-white">Ready to start your educational journey?</h2>
                <p class="lead mb-0">Join thousands of students already learning with us.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('register') }}" class="btn btn-accent btn-lg">Enroll Today</a>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <h2>Upcoming Events</h2>
                <p class="lead text-muted">Stay connected with our educational community</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('events') }}" class="btn btn-primary">View All Events</a>
            </div>
        </div>
        <div class="row">
            <!-- Event cards will be dynamically generated here -->
            @foreach($upcomingEvents ?? [] as $event)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white p-3 text-center me-3" style="width: 80px;">
                                <span class="d-block">{{ $event->start_date->format('M') }}</span>
                                <span class="d-block fs-4 fw-bold">{{ $event->start_date->format('d') }}</span>
                            </div>
                            <h5 class="card-title mb-0">{{ $event->title }}</h5>
                        </div>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <div class="d-flex align-items-center text-muted">
                            <i class="fas fa-clock me-2"></i>
                            <span>{{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A') }}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted mt-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>{{ $event->is_online ? 'Online Event' : $event->location }}</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- Placeholder events if no events are available -->
            @if(empty($upcomingEvents) || count($upcomingEvents) === 0)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white p-3 text-center me-3" style="width: 80px;">
                                <span class="d-block">Jun</span>
                                <span class="d-block fs-4 fw-bold">15</span>
                            </div>
                            <h5 class="card-title mb-0">Science Exhibition</h5>
                        </div>
                        <p class="card-text">Join us for an exciting showcase of student science projects and innovations.</p>
                        <div class="d-flex align-items-center text-muted">
                            <i class="fas fa-clock me-2"></i>
                            <span>9:00 AM - 4:00 PM</span>
                        </div>
                        <div class="d-flex align-items-center text-muted mt-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>Main Campus Auditorium</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white p-3 text-center me-3" style="width: 80px;">
                                <span class="d-block">Jun</span>
                                <span class="d-block fs-4 fw-bold">22</span>
                            </div>
                            <h5 class="card-title mb-0">Parent-Teacher Meeting</h5>
                        </div>
                        <p class="card-text">An opportunity for parents to discuss student progress with our dedicated teaching staff.</p>
                        <div class="d-flex align-items-center text-muted">
                            <i class="fas fa-clock me-2"></i>
                            <span>2:00 PM - 6:00 PM</span>
                        </div>
                        <div class="d-flex align-items-center text-muted mt-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <span>Online Event</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
