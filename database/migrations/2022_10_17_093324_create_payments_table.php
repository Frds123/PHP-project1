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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('alumni')->nullable();
            $table->decimal('deposit_total_amount')->nullable();
            $table->decimal('grand_total_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_type')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->text('payment_description')->nullable();
            $table->string('voucher_no')->nullable();
            $table->timestamp('voucher_date')->nullable();
            $table->string('deposit_from_branch_code')->nullable();
            $table->longText('reunion_info_json')->nullable();
            $table->longText('welfare_info_json')->nullable();
            $table->integer('is_approved')->default(0);
            $table->timestamp('approved_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
