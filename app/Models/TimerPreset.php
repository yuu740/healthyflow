<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimerPreset extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'duration_minutes', 'icon'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
