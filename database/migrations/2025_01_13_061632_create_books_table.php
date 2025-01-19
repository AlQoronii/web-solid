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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('book_id')->primary();
            $table->uuid('category_id')->index();
            $table->string('book_title');
            $table->string('book_author');
            $table->string('book_publisher');
            $table->enum('book_status', ['available', 'unavailable'])->default('available');
            $table->integer('book_year');
            $table->string('book_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
