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
      Schema::create('color_products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained('products', 'id')->cascadeOnDelete();
        $table->foreignId('color_id')->constrained('colors', 'id')->cascadeOnDelete();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('color_products');
    }
  };
