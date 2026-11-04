<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    if (! Schema::hasColumn('products', 'id')) {
      throw new \RuntimeException('The products table does not have an id column.');
    }

    $indexes = DB::select('SHOW INDEX FROM products');
    $primaryColumns = collect($indexes)
      ->where('Key_name', 'PRIMARY')
      ->sortBy('Seq_in_index')
      ->pluck('Column_name')
      ->values()
      ->all();

    if ($primaryColumns && $primaryColumns !== ['id']) {
      throw new \RuntimeException('The products table has an unexpected primary key.');
    }

    if ($primaryColumns) {
      DB::statement('ALTER TABLE products MODIFY id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
      return;
    }

    DB::statement('ALTER TABLE products MODIFY id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id)');
  }

  public function down(): void
  {
    // Keep the repaired primary key and auto-increment to avoid making product creation fail again.
  }
};
