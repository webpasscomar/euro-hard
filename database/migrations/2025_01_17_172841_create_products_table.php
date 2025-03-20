<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->text('description');
      $table->string('image_main');
      $table->string('code')->nullable();
      $table->string('image_1')->nullable();
      $table->string('image_2')->nullable();
      $table->string('image_3')->nullable();
      $table->string('image_4')->nullable();
      $table->string('image_5')->nullable();
      $table->string('image_6')->nullable();
      $table->string('video')->nullable();
      $table->boolean('is_new')->default(false);
      $table->text('information')->nullable();
      $table->string('datasheet_file')->nullable();
      $table->string('instruction_file')->nullable();
      $table->boolean('instruction_button')->default(false);
      $table->string('keywordsSEO')->nullable();
      $table->string('descriptionSEO')->nullable();
      $table->tinyInteger('status')->default(1);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};
