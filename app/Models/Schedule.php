<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['kode_mentor', 'hari', 'jam_mulai', 'jam_selesai'];

    public function course(): HasOne{
        return $this->hasOne(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'kode_mentor', 'kode_mentor');
    }
}
