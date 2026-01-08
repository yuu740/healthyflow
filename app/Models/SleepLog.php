<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepLog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'duration_hours', 'logged_at'];
    protected $casts = ['logged_at' => 'datetime'];
}   
