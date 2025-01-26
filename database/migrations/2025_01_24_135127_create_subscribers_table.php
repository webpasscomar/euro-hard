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
    Schema::create('subscribers', function (Blueprint $table) {
      $table->id();
      $table->string('firstName');
      $table->string('lastName');
      $table->string('company')->nullable();
      $table->string('phone');
      $table->string('email')->unique();
      $table->string('title')->nullable();
      $table->text('message')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('subscribers');
  }
};
