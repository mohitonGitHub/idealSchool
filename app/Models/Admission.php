<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $table = "admissions";
    protected $fillable = [
        'name', 'image', 'class_id', 'roll_number', 'academic_id', 'dob', 'address', 'father_name', 'f_profession', 'f_contact', 'mother_name',
        'm_profession', 'm_contact', 'emergency_number', 'date_of_addmission', 'rte', 'class_admitted', 'samarg_id', 'sibling', 'aadhar_number',
        'd_left_school', 'd_of_issuance', 'remark',
    ];
}
