<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('fax', 25)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('facebook')->nullable()->default('https://www.facebook.com');
            $table->string('youtube')->nullable()->default('https://www.youtube.com');
            $table->string('linkedin')->nullable()->default('https://www.linkedin.com/feed');
            $table->string('twitter')->nullable()->default('https://twitter.com');
            $table->string('smtpserver', 100)->nullable();
            $table->string('smtpemail', 100)->nullable();
            $table->string('smtppassword', 100)->nullable();
            $table->integer('smtpport')->nullable()->default(0);
            $table->text('references')->nullable();
            $table->text('about')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
