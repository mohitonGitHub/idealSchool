<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddM extends Model
{
    use HasFactory;
    protected $table = "add_m_s";
    protected $fillable = [
        'name', 'image', 'roll_number', 'dob', 'address', 'father_name', 'f_profession', 'f_contact', 'mother_name',
        'm_profession', 'm_contact', 'emergency_number', 'date_of_addmission', 'rte', 'class_admitted', 'samarg_id', 'sibling', 'aadhar_number',
        'd_left_school', 'd_of_issuance', 'remark',
    ];
}
