<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionSenderTable extends Migration
{
  public function up()
  {
    Schema::create('question_senders', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('phone_number');
      $table->text('message');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('question_senders');
  }
}
