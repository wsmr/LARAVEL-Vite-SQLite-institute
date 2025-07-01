@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1>Our Courses</h1>
            <p class="lead text-muted">Explore our comprehensive range of educational offerings</p>
        </div>
    </div>

    <!-- Course Filter Section -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search courses..." id="course-search">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <select class="form-select" id="category-filter">
                <option value="">All Categories</option>
                @foreach($categories ?? [] as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" id="sort-filter">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
            </select>
        </div>
    </div>

    <!-- Course Listing -->
    <div class="row" id="course-list">
        @forelse($courses ?? [] as $course)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card course-card h-100">
                @if($course->is_featured)
                <span class="badge bg-accent">Featured</span>
                @endif
                <img src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="{{ $course->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ $course->instructor->profile_photo ? asset('storage/'.$course->instructor->profile_photo) : asset('images/user-placeholder.jpg') }}" class="rounded-circle me-2" width="30" height="30" alt="{{ $course->instructor->name }}">
                        <span class="text-muted">{{ $course->instructor->name }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">{{ $course->category->name }}</span>
                        <span class="text-muted">{{ $course->lessons->count() }} lessons</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        @if($course->price > 0)
                            <span class="fw-bold">Rs. {{ number_format($course->price, 2) }}</span>
                        @else
                            <span class="fw-bold text-success">Free</span>
                        @endif
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Placeholder courses if no courses are available -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card course-card h-100">
                <span class="badge bg-accent">Featured</span>
                <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="Mathematics">
                <div class="card-body">
                    <h5 class="card-title">Advanced Mathematics</h5>
                    <p class="card-text">Master complex mathematical concepts with our comprehensive course designed for excellence.</p>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/user-placeholder.jpg') }}" class="rounded-circle me-2" width="30" height="30" alt="Teacher">
                        <span class="text-muted">Dr. Rajitha Perera</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">Mathematics</span>
                        <span class="text-muted">12 lessons</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Rs. 15,000.00</span>
                        <a href="#" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card course-card h-100">
                <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="Science">
                <div class="card-body">
                    <h5 class="card-title">Physics for Beginners</h5>
                    <p class="card-text">Explore the fundamental principles of physics through interactive lessons and experiments.</p>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/user-placeholder.jpg') }}" class="rounded-circle me-2" width="30" height="30" alt="Teacher">
                        <span class="text-muted">Prof. Nimal Silva</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">Science</span>
                        <span class="text-muted">10 lessons</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Rs. 12,500.00</span>
                        <a href="#" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card course-card h-100">
                <img src="{{ asset('images/course-placeholder.jpg') }}" class="card-img-top" alt="English">
                <div class="card-body">
                    <h5 class="card-title">English Literature</h5>
                    <p class="card-text">Develop critical analysis skills through the study of classic and contemporary literature.</p>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/user-placeholder.jpg') }}" class="rounded-circle me-2" width="30" height="30" alt="Teacher">
                        <span class="text-muted">Ms. Kumari Fernando</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">Languages</span>
                        <span class="text-muted">8 lessons</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-success">Free</span>
                        <a href="#" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Course pagination">
                {{ $courses->links() ?? '' }}
            </nav>
        </div>
    </div>
</div>
@endsection
