<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('book_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->index()->constrained('books')->cascadeOnDelete();
            $table->foreignId('member_id')->index()->constrained('members')->cascadeOnDelete();
            $table->date('borrowed_date');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_members');
    }
};
