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
            $table->string('smtpserver', 100)->nullable();
            $table->string('smtpemail', 100)->nullable();
            $table->string('smtppassword', 100)->nullable();
            $table->integer('smtpport')->nullable()->default(0);
            $table->text('references')->nullable();
            $table->text('about')->nullable();
            $table->text('contact')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->boolean('reset')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
