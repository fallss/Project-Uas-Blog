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
        Schema::create('articles', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('category_id')->index()->constrained();
            $table->string('title');
            $table->string('slug');
            $table->longText('desc');    
            $table->string('img');          
            $table->string('status');
            $table->integer('views')->default('0');
            $table->date('publish_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};