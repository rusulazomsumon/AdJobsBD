<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'company_id', 'category_id', 'location', 'vacancy',
        'salary', 'type', 'experience_level', 'skills', 'education_level',
        'benefits', 'deadline', 'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }
}
