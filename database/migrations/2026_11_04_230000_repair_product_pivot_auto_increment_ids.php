<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    foreach (['category_products', 'color_products', 'product_products'] as $table) {
      if (! Schema::hasTable($table) || ! Schema::hasColumn($table, 'id')) {
        throw new \RuntimeException("The {$table} table or its id column does not exist.");
      }

      $indexes = DB::select("SHOW INDEX FROM `{$table}`");
      $primaryColumns = collect($indexes)
        ->where('Key_name', 'PRIMARY')
        ->sortBy('Seq_in_index')
        ->pluck('Column_name')
        ->values()
        ->all();

      if ($primaryColumns && $primaryColumns !== ['id']) {
        throw new \RuntimeException("The {$table} table has an unexpected primary key.");
      }

      if ($primaryColumns) {
        DB::statement("ALTER TABLE `{$table}` MODIFY id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT");
      } else {
        DB::statement("ALTER TABLE `{$table}` MODIFY id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id)");
      }
    }
  }

  public function down(): void
  {
    // Keep repaired keys and auto-increment behavior to avoid breaking pivot inserts.
  }
};
