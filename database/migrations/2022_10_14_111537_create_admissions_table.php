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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('roll_number');
            $table->string('dob');
            $table->string('address');
            $table->string('father_name');
            $table->string('f_profession');
            $table->string('f_contact');
            $table->string('mother_name');
            $table->string('m_profession');
            $table->string('m_contact');
            $table->string('emergency_number');
            $table->string('date_of_addmission');
            $table->string('rte');
            $table->string('class_admitted');
            $table->string('samarg_id');
            $table->string('sibling');
            $table->string('aadhar_number');
            $table->string('d_left_school');
            $table->string('d_of_issuance');
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
        Schema::dropIfExists('admissions');
    }
};
