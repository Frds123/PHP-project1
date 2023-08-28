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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name')->nullable();
            $table->string('membership_no')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('profession')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->string('place_of_joning')->nullable();
            $table->string('place_of_posting')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_add_ps')->nullable();
            $table->string('office_district')->nullable();
            $table->string('office_add_zip')->nullable();
            $table->string('academic_regi_no')->nullable();
            $table->string('academic_hall_of_residence')->nullable();
            $table->string('academic_postgraduate_from')->nullable();
            $table->string('present_address')->nullable();
            $table->string('present_add_ps')->nullable();
            $table->string('present_district')->nullable();
            $table->string('present_add_zip')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('permanent_add_ps')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_add_zip')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};