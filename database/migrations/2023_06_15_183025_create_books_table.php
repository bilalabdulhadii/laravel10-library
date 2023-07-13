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
            /*
            Explore the pages of this captivating book, where imagination knows no bounds.
            Written by a talented author, this literary treasure offers a compelling narrative that will
            transport you to new worlds and engage your senses. With its masterful storytelling and rich characters,
            this book promises an unforgettable reading experience. Dive into its pages and let your imagination soar.
            */
            $table->integer('quantity_available')->nullable();
            $table->string('language', 25)->nullable()->default('English');
            $table->integer('publication_year')->nullable();
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
