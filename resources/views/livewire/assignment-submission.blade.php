<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Submit Assignment</h4>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            @if(now() > $assignment->due_date)
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    The due date for this assignment has passed. Late submissions may be penalized.
                </div>
            @endif
            
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label for="content" class="form-label">Your Answer</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="8" wire:model="content"></textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="attachment" class="form-label">Attachment (Optional)</label>
                    <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" wire:model="attachment">
                    <div class="form-text">Max file size: 10MB</div>
                    @error('attachment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    <div wire:loading wire:target="attachment" class="mt-2">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="text-muted ms-2">Uploading...</span>
                    </div>
                </div>
                
                @if($hasSubmitted && $submission->attachment)
                    <div class="mb-3">
                        <label class="form-label">Current Attachment</label>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-file-alt me-2 text-primary"></i>
                            <a href="{{ asset('storage/' . $submission->attachment) }}" target="_blank" download>
                                {{ basename($submission->attachment) }}
                            </a>
                        </div>
                    </div>
                @endif
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading wire:target="submit">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Submitting...
                        </span>
                        <span wire:loading.remove wire:target="submit">
                            {{ $hasSubmitted ? 'Update Submission' : 'Submit Assignment' }}
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
