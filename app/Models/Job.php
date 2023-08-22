<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use App\Models\Companies;
use App\Models\User;


class Job extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'id',
        'job_title',
        'job_region',
        'job_type',
        'vacancy',
        'experience',
        'salary',
        'Gender',
        'application_deadline',
        'jobdescription',
        'responsibilities',
        'category_id',
        'education_experience',
        'otherbenefits',
        'image',


    ];
    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'job_user', 'job_id', 'user_id')->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
