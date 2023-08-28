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
        Schema::create('reunion_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('relationalinfos_id');
            // $table->foreign('relationalinfos_id')->references('id')->on('relationalinfos');
            $table->integer('alumni');
            $table->unsignedBigInteger('image_id');
            // $table->foreign('image_id')->references('id')->on('images');
            $table->string('t_deposit_amount');
            $table->string('mode_of _payment');
            $table->date('payment_date');
            $table->string('payment_description');
            $table->json('attendies');
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
        Schema::dropIfExists('reunion_reports');
    }
};
