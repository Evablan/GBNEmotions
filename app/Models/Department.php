<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'description']; // Campos que se pueden llenar

    public function moodEmotions()
    {
        return $this->hasMany(MoodEmotion::class); // Relación con MoodEmotion
    }
}
