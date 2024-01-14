<?php

namespace App\Models;
use App\Models\Company;
use App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
}
