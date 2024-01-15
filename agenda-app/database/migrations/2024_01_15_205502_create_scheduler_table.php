<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scheduler', function (Blueprint $table) {
            $table->id();
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('status');
            $table->unsignedBigInteger('staff_user_id');
            $table->unsignedBigInteger('client_user_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();


            $table->foreign('service_id')
            ->references('id')
            ->on('services')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('client_user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('staff_user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduler');
    }
};
