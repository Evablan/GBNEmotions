<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoodEmotion extends Model
{
    protected $table = 'mood_emotions';

    protected $fillable = [
        'employee_id', 'emotion', 'answer_1', 'answer_2', 'answer_3', 'diary_text', 'department_id'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class); // Relación con Department
    }
}
