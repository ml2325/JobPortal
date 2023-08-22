<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job;

class CVuser extends Model
{
    use HasFactory;
    
    protected $table = 'cv_user'; // Set the table name to 'cv_user' as defined in the migration.

    protected $fillable = [
        'user_id',
        
        'cv_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
