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
    Schema::create('product_details', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->string('locale')->index();
      $table->string('name')->length(255);
      $table->text('detail_description');
      $table->text('purchase_conditions');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_details');
  }
};
