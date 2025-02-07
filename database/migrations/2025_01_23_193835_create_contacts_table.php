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
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string('address');
      $table->string('phone');
      $table->string('email');
      $table->string('facebook')->nullable();
      $table->string('instagram')->nullable();
      $table->string('youtube')->nullable();
      $table->string('whatsapp')->nullable();
      $table->string('map')->nullable();
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
    Schema::dropIfExists('contacts');
  }
};
