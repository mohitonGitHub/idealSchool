<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFee extends Model
{
    use HasFactory;

    protected $table = "add_fees";
    protected $fillable = ['fee_head_id', 'class_id', 'academic_session_id', 'amount', 'desc', 'status'];
}
