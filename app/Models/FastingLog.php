<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FastingLog extends Model
{
    /** @use HasFactory<\Database\Factories\FastingLogFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'start_time', 'end_time', 'target_duration_hours'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
