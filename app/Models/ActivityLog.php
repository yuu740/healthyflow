<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityLogFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'activity_name', 'duration_minutes', 'logged_at'];

    protected $casts = [
        'logged_at' => 'datetime',
        'duration_minutes' => 'integer',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
