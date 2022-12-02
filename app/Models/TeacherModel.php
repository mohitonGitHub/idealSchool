<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    use HasFactory;

    protected $table = 'teacher';
    protected $fillable = ['name', 'designation', 'qualification', 'DOB', 'gender', 'email', 'number', 'IDCard', 'joining_date', 'add', 'image', 'username', 'password'];
}
