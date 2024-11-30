<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeTrial extends Model
{

    use HasFactory;
    protected $table = 'free_trials';

    protected $fillable = [
        'name',
        'english_name',
        'age',
        'phone',
        'email',
        'gender',
        'introduction',
        'class_date',
        'time',
        'requests',
        'signup_path',
        'coupon',
    ];
}
