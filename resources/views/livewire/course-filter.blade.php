<div>
    <div class="row mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search courses..." wire:model.debounce.300ms="search">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <select class="form-select" wire:model="category">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" wire:model="sort">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
            </select>
        </div>
    </div>

    <div class="row" id="course-list">
        @forelse($courses as $course)
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
        <div class="col-12 text-center py-5">
            <div class="mb-4">
                <i class="fas fa-search fa-3x text-muted"></i>
            </div>
            <h4>No courses found</h4>
            <p class="text-muted">Try adjusting your search or filter to find what you're looking for.</p>
        </div>
        @endforelse
    </div>

    <div class="row mt-4">
        <div class="col-12">
            {{ $courses->links() }}
        </div>
    </div>
</div>
