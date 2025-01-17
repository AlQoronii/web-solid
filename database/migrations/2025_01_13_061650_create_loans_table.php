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
        Schema::create('loans', function (Blueprint $table) {
            $table->uuid('loan_id')->primary();
            $table->uuid('user_id')->index();
            $table->uuid('book_id')->index();
            $table->date('borrow_date');
            $table->date('return_date');
            $table->enum('loan_status', ['borrowed', 'returned', 'overdue']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    
    {
        Schema::dropIfExists('loans');
    }
};
