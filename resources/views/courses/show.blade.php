@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1>Course Details</h1>
            <p class="lead text-muted">Comprehensive information about this educational offering</p>
        </div>
    </div>

    <div class="row">
        <!-- Course Details -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <img src="{{ $course->thumbnail ?? asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="{{ $course->title ?? 'Course Title' }}">
                <div class="card-body">
                    <h2>{{ $course->title ?? 'Advanced Mathematics' }}</h2>
                    
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ $course->instructor->profile_photo ?? asset('images/user-placeholder.jpg') }}" class="rounded-circle me-2" width="40" height="40" alt="{{ $course->instructor->name ?? 'Instructor' }}">
                        <div>
                            <p class="mb-0 fw-bold">{{ $course->instructor->name ?? 'Dr. Rajitha Perera' }}</p>
                            <p class="text-muted mb-0 small">{{ $course->instructor->qualification ?? 'PhD in Mathematics' }}</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h4>Description</h4>
                        <p>{{ $course->description ?? 'This comprehensive mathematics course is designed to help students master complex mathematical concepts through a structured curriculum. The course covers advanced algebra, calculus, and statistics with practical applications and problem-solving techniques.' }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h4>Syllabus</h4>
                        <p>{{ $course->syllabus ?? 'The course is structured into modules covering: 1) Advanced Algebra and Functions, 2) Differential Calculus, 3) Integral Calculus, 4) Probability and Statistics, 5) Mathematical Modeling. Each module includes theory, examples, practice problems, and assessments.' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Lessons Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Course Content</h4>
                </div>
                <div class="card-body">
                    <div class="accordion" id="lessonsAccordion">
                        @forelse($course->lessons ?? [] as $index => $lesson)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                    <div class="d-flex justify-content-between w-100 me-3">
                                        <span>{{ $lesson->title }}</span>
                                        <span class="text-muted small">{{ $lesson->duration }} min</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#lessonsAccordion">
                                <div class="accordion-body">
                                    <p>{{ $lesson->description }}</p>
                                    @if($lesson->video_url)
                                    <div class="mb-3">
                                        <a href="{{ $lesson->video_url }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="fas fa-play-circle me-1"></i> Watch Video
                                        </a>
                                    </div>
                                    @endif
                                    @if($lesson->attachment)
                                    <div>
                                        <a href="{{ asset('storage/'.$lesson->attachment) }}" class="btn btn-sm btn-outline-secondary" download>
                                            <i class="fas fa-download me-1"></i> Download Materials
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- Placeholder lessons if no lessons are available -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <div class="d-flex justify-content-between w-100 me-3">
                                        <span>Introduction to Advanced Mathematics</span>
                                        <span class="text-muted small">45 min</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#lessonsAccordion">
                                <div class="accordion-body">
                                    <p>An overview of the course structure and introduction to key mathematical concepts that will be covered.</p>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-play-circle me-1"></i> Watch Video
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-download me-1"></i> Download Materials
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="d-flex justify-content-between w-100 me-3">
                                        <span>Advanced Algebra Fundamentals</span>
                                        <span class="text-muted small">60 min</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#lessonsAccordion">
                                <div class="accordion-body">
                                    <p>Exploring complex algebraic expressions, equations, and their applications in problem-solving.</p>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-play-circle me-1"></i> Watch Video
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-download me-1"></i> Download Materials
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="d-flex justify-content-between w-100 me-3">
                                        <span>Calculus: Differentiation Techniques</span>
                                        <span class="text-muted small">75 min</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#lessonsAccordion">
                                <div class="accordion-body">
                                    <p>Understanding the principles of differentiation and applying various techniques to solve complex problems.</p>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-play-circle me-1"></i> Watch Video
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-download me-1"></i> Download Materials
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <!-- Assignments Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Assignments</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Due Date</th>
                                    <th>Total Marks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($course->assignments ?? [] as $assignment)
                                <tr>
                                    <td>{{ $assignment->title }}</td>
                                    <td>{{ $assignment->due_date->format('M d, Y') }}</td>
                                    <td>{{ $assignment->total_marks }}</td>
                                    <td>
                                        <a href="{{ route('assignments.show', $assignment) }}" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                                @empty
                                <!-- Placeholder assignments if no assignments are available -->
                                <tr>
                                    <td>Algebraic Equations Problem Set</td>
                                    <td>Jun 15, 2025</td>
                                    <td>100</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Calculus Applications Project</td>
                                    <td>Jun 30, 2025</td>
                                    <td>150</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Course Info Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Course Information</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-calendar-alt me-2 text-accent"></i>
                            <span class="fw-bold">Duration:</span> 12 weeks
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-book me-2 text-accent"></i>
                            <span class="fw-bold">Lessons:</span> {{ $course->lessons->count() ?? '12' }}
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-tasks me-2 text-accent"></i>
                            <span class="fw-bold">Assignments:</span> {{ $course->assignments->count() ?? '5' }}
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-users me-2 text-accent"></i>
                            <span class="fw-bold">Students Enrolled:</span> {{ $course->enrollments->count() ?? '42' }}
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-tag me-2 text-accent"></i>
                            <span class="fw-bold">Category:</span> {{ $course->category->name ?? 'Mathematics' }}
                        </li>
                    </ul>
                    
                    <div class="d-grid gap-2 mt-4">
                        @if(isset($enrolled) && $enrolled)
                            <a href="#" class="btn btn-success">
                                <i class="fas fa-check-circle me-2"></i> Enrolled
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-book-reader me-2"></i> Continue Learning
                            </a>
                        @else
                            @if(isset($course) && $course->price > 0)
                                <div class="mb-3 text-center">
                                    <span class="h3 fw-bold">Rs. {{ number_format($course->price ?? 15000, 2) }}</span>
                                </div>
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-shopping-cart me-2"></i> Enroll Now
                                </a>
                            @else
                                <div class="mb-3 text-center">
                                    <span class="h3 fw-bold text-success">Free</span>
                                </div>
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-user-plus me-2"></i> Enroll Now
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Related Courses -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Related Courses</h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @forelse($relatedCourses ?? [] as $relatedCourse)
                        <a href="{{ route('courses.show', $relatedCourse) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="{{ $relatedCourse->thumbnail ? asset('storage/'.$relatedCourse->thumbnail) : asset('images/course-placeholder.jpg') }}" class="me-3" width="60" height="60" alt="{{ $relatedCourse->title }}">
                            <div>
                                <h6 class="mb-1">{{ $relatedCourse->title }}</h6>
                                <p class="text-muted mb-0 small">{{ $relatedCourse->lessons->count() }} lessons</p>
                            </div>
                        </a>
                        @empty
                        <!-- Placeholder related courses if none are available -->
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="{{ asset('images/course-placeholder.jpg') }}" class="me-3" width="60" height="60" alt="Calculus">
                            <div>
                                <h6 class="mb-1">Calculus Fundamentals</h6>
                                <p class="text-muted mb-0 small">8 lessons</p>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="{{ asset('images/course-placeholder.jpg') }}" class="me-3" width="60" height="60" alt="Statistics">
                            <div>
                                <h6 class="mb-1">Statistics and Probability</h6>
                                <p class="text-muted mb-0 small">10 lessons</p>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="{{ asset('images/course-placeholder.jpg') }}" class="me-3" width="60" height="60" alt="Geometry">
                            <div>
                                <h6 class="mb-1">Advanced Geometry</h6>
                                <p class="text-muted mb-0 small">6 lessons</p>
                            </div>
                        </a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
