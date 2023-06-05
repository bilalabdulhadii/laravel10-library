<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 25);
            $table->string('lname', 25)->nullable();
            $table->string('dates', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('books')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
