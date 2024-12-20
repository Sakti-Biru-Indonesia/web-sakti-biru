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
    Schema::create('article_meta_contents', function (Blueprint $table) {
      $table->id();
      $table->integer('article_id');
      $table->string('locale')->index();
      $table->string('title')->nullable();
      $table->text('description')->nullable();
      $table->text('keywords')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('article_meta_contents');
  }
};
