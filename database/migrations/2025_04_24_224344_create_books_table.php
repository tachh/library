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
            $table->foreignId('author_id')->index()->constrained('authors')->cascadeOnDelete();
            $table->foreignId('category_id')->index()->constrained('categories')->cascadeOnDelete();
            $table->foreignId('publisher_id')->index()->constrained('publishers')->cascadeOnDelete();
            $table->integer('pages');
            $table->string('language');
            $table->string('isbn')->unique();
            $table->string('cover')->nullable();
            $table->boolean('available')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
