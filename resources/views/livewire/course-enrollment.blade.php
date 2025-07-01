<div>
    <div class="d-grid gap-2 mt-4">
        @if($enrolled)
            <a href="#" class="btn btn-success">
                <i class="fas fa-check-circle me-2"></i> Enrolled
            </a>
            <a href="{{ route('dashboard.courses.show', $course) }}" class="btn btn-outline-primary">
                <i class="fas fa-book-reader me-2"></i> Continue Learning
            </a>
        @else
            @if($course->price > 0)
                <div class="mb-3 text-center">
                    <span class="h3 fw-bold">Rs. {{ number_format($course->price, 2) }}</span>
                </div>
                <button wire:click="enroll" class="btn btn-primary">
                    <i class="fas fa-shopping-cart me-2"></i> Enroll Now
                </button>
            @else
                <div class="mb-3 text-center">
                    <span class="h3 fw-bold text-success">Free</span>
                </div>
                <button wire:click="enroll" class="btn btn-primary">
                    <i class="fas fa-user-plus me-2"></i> Enroll Now
                </button>
            @endif
        @endif
    </div>
    
    @if(session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
