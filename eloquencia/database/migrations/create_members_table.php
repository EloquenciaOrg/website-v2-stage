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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Full name');
            $table->string('firstname')->comment('First name');
            $table->string('email')->unique()->comment('Email address');
            $table->integer('registrationToken')->unique()->comment('Unique token for registration');
            $table->string('password')->comment('Password in bcrypt format');
            $table->tinyInteger('newsletter')->default(0)->comment('0 if not subscribed, 1 if subscribed');
            $table->datetime('registrationDate')->default(now())->comment('Membership registration date');
            $table->datetime('expirationDate')->default(now() ->addYear())->comment('Membership expiration date');
            $table->json('subscriptionHistory')->nullable()->comment('Membership history');
            $table->integer('resetToken')->nullable()->comment('Unique token for password reset');
            $table->json('lessons_history')->nullable()->comment('History of lessons taken through the LMS');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
