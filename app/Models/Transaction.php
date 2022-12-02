<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
    protected $fillable = ['studentId', 'studentName', 'regNo', 'feeHead', 'session', 'classId', 'sectionId', 'academicYearId', 'totalAmt', 'paidAmt', 'dueAmt', 'dueDate', 'paymentDate', 'recivedBy', 'remark'];
}
