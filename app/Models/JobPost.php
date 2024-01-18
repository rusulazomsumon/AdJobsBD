<?php

namespace App\Models;
use App\Models\Company;
use App\Models\JobCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class JobPost extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'title', 'description', 'company_id', 'category_id', 'location', 'vacancy',
        'salary', 'type', 'experience_level', 'skills', 'education_level',
        'benefits', 'deadline', 'accessibility_needs',
        'strengths_and_skills', 'suggested_accommodations',
    ];

    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'company_id' => 'required|integer',
        'category_id' => 'required|integer',
        'location' => 'required|string|max:255',
        'vacancy' => 'required|string',
        'salary' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'experience_level' => 'required|string|max:255',
        'skills' => 'required|string|max:255',
        'education_level' => 'required|string|max:255',
        'benefits' => 'required|string|max:255',
        'deadline' => 'required|date',
        'accessibility_needs' => 'required|string|max:255',
        'strengths_and_skills' => 'required|string|max:255',
        'suggested_accommodations' => 'required|string|max:255',


          
    ];
    // reletionship 

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\JobCategory::class);

    }

    // sending after validate

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }
}
