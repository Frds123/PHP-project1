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
        Schema::create('welfare_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('from_month_name');
            $table->string('from_year');
            $table->string('to_month_name');
            $table->string('to_year');
            $table->string('month_count');
            $table->string('deposited_amount');
            $table->string('grand_total');
            $table->date('voucher_date');
            $table->string('image_id');
            $table->string('deposited_from_branch_code');
            $table->string('transaction_type');
            $table->string('transaction_purpose');
            $table->string('details');
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
        Schema::dropIfExists('welfare_reports');
    }
};
