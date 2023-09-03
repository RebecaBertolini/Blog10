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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //title, description, body, slug, thumb
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->string('slug'); //Título exemplo -> slug: titulo-exemplo. Ficaria /posts/titulo-exemplo -> busca na base pelo slug
            $table->string('thumb')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
