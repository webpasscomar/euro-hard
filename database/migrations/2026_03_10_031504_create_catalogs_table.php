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
        if (!Schema::hasTable('catalogs')) {
            Schema::create('catalogs', function (Blueprint $table) {
                $table->id();
                $table->string('title')->unique();
                $table->string('slug')->unique();
                $table->string('image')->nullable();
                $table->string('pdf');
                $table->integer('order')->nullable();
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
            });
        } else {
            Schema::table('catalogs', function (Blueprint $table) {
                if (!Schema::hasColumn('catalogs', 'slug')) {
                    $table->string('slug')->unique()->after('title');
                }
                if (!Schema::hasColumn('catalogs', 'title')) {
                    $table->string('title')->unique()->first();
                }
                if (!Schema::hasColumn('catalogs', 'image')) {
                    $table->string('image')->nullable()->after('slug');
                }
                if (!Schema::hasColumn('catalogs', 'pdf')) {
                    $table->string('pdf')->after('image');
                }
                if (!Schema::hasColumn('catalogs', 'order')) {
                    $table->integer('order')->nullable()->after('pdf');
                }
                if (!Schema::hasColumn('catalogs', 'status')) {
                    $table->tinyInteger('status')->default(1)->after('order');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
