<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uyelik extends Model
{
    use HasFactory;
    protected $fillable = ["topic_id", "user_id"];

    public function topics()
    {
        return $this->belongsToMany(Topic::class , 'uyeliks');
    }
    public function users()
    {
        return $this->belongsToMany(User::class , 'uyeliks');
    }
}
