<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\User;

class ExamAttempt extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total_score', 'status'];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
