<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    use HasFactory;
    
    protected $table = 'class';
    protected $fillable = ['class_name', 'numeric_value', 'openForAdd', 'note'];
    
}
