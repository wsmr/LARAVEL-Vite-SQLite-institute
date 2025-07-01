<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Assignment;
use App\Models\Submission;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentSubmission extends Component
{
    use WithFileUploads;
    
    public $assignment;
    public $content;
    public $attachment;
    public $submission;
    public $hasSubmitted = false;
    
    protected $rules = [
        'content' => 'required|string',
        'attachment' => 'nullable|file|max:10240', // 10MB max
    ];
    
    public function mount(Assignment $assignment)
    {
        $this->assignment = $assignment;
        
        if (Auth::check()) {
            $this->submission = Submission::where('assignment_id', $this->assignment->id)
                ->where('student_id', Auth::id())
                ->first();
                
            if ($this->submission) {
                $this->hasSubmitted = true;
                $this->content = $this->submission->content;
            }
        }
    }
    
    public function submit()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $this->validate();
        
        // Check if due date has passed
        if (now() > $this->assignment->due_date) {
            session()->flash('error', 'The due date for this assignment has passed.');
            return;
        }
        
        $attachmentPath = null;
        
        if ($this->attachment) {
            $attachmentPath = $this->attachment->store('assignments', 'public');
        }
        
        if ($this->hasSubmitted) {
            // Update existing submission
            $this->submission->update([
                'content' => $this->content,
                'attachment' => $attachmentPath ?? $this->submission->attachment,
                'status' => 'submitted',
            ]);
            
            session()->flash('success', 'Your submission has been updated successfully.');
        } else {
            // Create new submission
            Submission::create([
                'content' => $this->content,
                'attachment' => $attachmentPath,
                'status' => 'submitted',
                'assignment_id' => $this->assignment->id,
                'student_id' => Auth::id(),
            ]);
            
            $this->hasSubmitted = true;
            session()->flash('success', 'Your assignment has been submitted successfully.');
        }
        
        $this->reset(['attachment']);
    }
    
    public function render()
    {
        return view('livewire.assignment-submission');
    }
}
