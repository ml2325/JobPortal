<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\CVuser;
use App\Models\User;

class Application extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    public function cvUser()
    {
        return $this->belongsTo(CVuser::class, 'user_id'); // Correct the case for the CVUser model
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
