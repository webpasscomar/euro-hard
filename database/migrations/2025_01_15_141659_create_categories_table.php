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
    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('feature')->nullable();
      $table->string('color', 12);
      $table->string('image');
      $table->string('banner');
      $table->tinyInteger('status')->default(1);
      $table->foreignId('categoryParent_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('categories');
  }
};
