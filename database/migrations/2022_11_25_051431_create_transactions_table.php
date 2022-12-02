<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('studentId');
            $table->string('studentName');
            $table->string('regNo');
            $table->string('feeHead');
            $table->string('session')->nullable();
            $table->string('classId');
            $table->string('sectionId');
            $table->string('academicYearId');
            $table->string('totalAmt');
            $table->string('paidAmt');
            $table->string('dueAmt');
            $table->string('dueDate');
            $table->string('paymentDate');
            $table->string('recivedBy');
            $table->string('remark');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
