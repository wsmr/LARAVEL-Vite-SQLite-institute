<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'video_url',
        'attachment',
        'duration',
        'order',
        'is_published',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
