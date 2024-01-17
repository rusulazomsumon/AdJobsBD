<?php

namespace App\Models;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table = 'job_category'; //bacause, I have created a wrong name, this table name shuld: job_categories, thats why my model relation not working
    protected $fillable = [
        'name',  // Add 'name' to the fillable array
        'description',
        'category_types',
        'icon',
    ];

    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
}
