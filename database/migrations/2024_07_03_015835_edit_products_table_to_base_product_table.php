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
    Schema::table('products', function (Blueprint $table) {
      $table->dropColumn('title');
      $table->dropColumn('detail_description');
      $table->dropColumn('purchase_conditions');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('products', function (Blueprint $table) {
      $table->string('title')->after('id');
      $table->text('detail_description')->after('price');
      $table->text('purchase_conditions')->after('detail_description');
    });
  }
};
