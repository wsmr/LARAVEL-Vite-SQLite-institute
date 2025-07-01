<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\CourseCategory;
use Livewire\Component;
use Livewire\WithPagination;

class CourseFilter extends Component
{
    use WithPagination;
    
    public $search = '';
    public $category = '';
    public $sort = 'newest';
    
    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'sort' => ['except' => 'newest'],
    ];
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingCategory()
    {
        $this->resetPage();
    }
    
    public function updatingSort()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $categories = CourseCategory::orderBy('name')->get();
        
        $coursesQuery = Course::query()
            ->with(['category', 'instructor'])
            ->where('is_published', true);
            
        // Apply search filter
        if ($this->search) {
            $coursesQuery->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
        
        // Apply category filter
        if ($this->category) {
            $coursesQuery->where('category_id', $this->category);
        }
        
        // Apply sorting
        switch ($this->sort) {
            case 'oldest':
                $coursesQuery->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $coursesQuery->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $coursesQuery->orderBy('title', 'desc');
                break;
            default:
                $coursesQuery->orderBy('created_at', 'desc');
                break;
        }
        
        $courses = $coursesQuery->paginate(9);
        
        return view('livewire.course-filter', [
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }
}
