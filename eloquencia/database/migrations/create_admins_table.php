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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->comment('Email address of the admin');
            $table->string('password')->comment('Password in bcrypt format');
            $table->integer('cookie')->nullable()->comment('Unique token for cookie authentication');
            $table->integer('reset')->nullable()->comment('Unique token for password reset');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
