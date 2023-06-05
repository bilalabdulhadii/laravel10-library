<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')
                ->nullable()
                ->references('id')
                ->on('authors')
                ->onDelete('RESTRICT');
            $table->string('isbn',15)->unique();
            $table->text('description')->nullable();
            $table->integer('quantity_available')->nullable();
            $table->string('language', 25)->nullable();
            $table->year('publication_year')->nullable();
            $table->integer('edition')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
