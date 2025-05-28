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
        Schema::create('bans', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable()->comment('email address of the banned member');
            $table->string('ip')->nullable()->comment('IP address of the banned member');
        });

        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the blog post');
            $table->longtext('content')->comment('Content of the blog post');
            $table->mediumBlob('pic')->comment('Image of the blog post');
            $table->datetime('publishdate')->default(now())->comment('Creation date of the blog post');
            $table->tinyInteger('featured')->default(0)->comment('0 if not featured, 1 if featured');
        });

        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Full name of the sender');
            $table->string('email')->comment('Email address of the sender');
            $table->text('message')->comment('Message sent by the sender');
            $table->datetime('senddate')->default(now())->comment('Date of sending the message');
            $table->string('ip')->comment('IP address of the sender');
        });

        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the member');
            $table->string('email')->comment('Email address of the member');
            $table->longblob('proof')->comment('Proof of status');
            $table->tinyInteger('state')->default(0)->comment('0 if not validated, 1 if validated, 2 if refused');
            $table->string('ip')->comment('IP address of the member');
            $table->datetime('senddate')->default(now())->comment('Date of sending the proof');
        });

        Schema::create('discounts_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('Discount code');
            $table->string('email')->comment('Email address of the member');
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the lesson');
            $table->string('summary')->comment('Summary of the lesson');
            $table->longtext('content')->comment('Content of the lesson');
            $table->integer('chapter')->comment('Chapter ID of the lesson');      
        });

        Schema::create('lessons_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Title of the chapter');
            $table->text('description')->comment('Description of the chapter');
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the setting');
            $table->longtext('value')->comment('Value of the setting');
            $table->tinyInteger('state')->default(1)->comment('0 if not activated, 1 if activated');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bans');
        Schema::dropIfExists('blog');
        Schema::dropIfExists('contact');
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discounts_codes');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('lessons_chapters');
        Schema::dropIfExists('settings');
    }
};
