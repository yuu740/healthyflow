<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDiary extends Model
{
    /** @use HasFactory<\Database\Factories\FoodDiaryFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'food_name', 'image_path', 'notes', 'logged_at'];

    protected $casts = [
        'logged_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
