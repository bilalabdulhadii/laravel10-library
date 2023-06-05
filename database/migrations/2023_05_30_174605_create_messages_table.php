<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 20)->nullable();
            $table->string('subject', 100)->nullable();
            $table->text('message')->nullable();
            $table->text('reply')->nullable();
            $table->string('note', 150)->nullable();
            $table->string('ip', 50)->nullable();
            $table->string('status', 25)->nullable()->default('New');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
