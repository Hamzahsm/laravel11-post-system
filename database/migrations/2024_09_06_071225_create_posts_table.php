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
            $table->string('slug')->unique();
            // $table->unsignedBigInteger('author_id'); //relationship with table User
            // $table->foreign('author_id')->references('id')->on('users'); //hubungkan kolom author id dengan id yang ada yang berada di user
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id', //ini penamaan ada
            ); //kolom author di post disamakan dengan id yang ada di table user
            $table->string('title');
            $table->text('body');
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
