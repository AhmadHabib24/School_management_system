<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'user_id',
        'name',
        'nick_name',
        'certificate',
        'about_me',
        'class_strength',
        'teaching_style',
    ];

    protected $casts = [
        'teaching_style' => 'array', // Automatically cast JSON to array
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
