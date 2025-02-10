<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = ['period_id', 'name', 'start_date', 'end_date'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    // Cek apakah timeline sudah lewat
    public function isPassed()
    {
        return $this->end_date < now();  // Cek apakah end_date sudah lewat
    }

    // Cek apakah timeline sedang berlangsung
    public function isOngoing()
    {
        return $this->start_date <= now() && $this->end_date >= now();  // Cek apakah sekarang dalam rentang start_date dan end_date
    }
}
