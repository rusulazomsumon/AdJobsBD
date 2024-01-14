<?php

namespace App\Models;
use App\Models\Job;
use App\Models\JobCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
}
