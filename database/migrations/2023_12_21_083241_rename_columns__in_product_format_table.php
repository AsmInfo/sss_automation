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
        Schema::table('product_format', function (Blueprint $table) {
            //
            $table->renameColumn('products_id', 'product_id');
            $table->renameColumn('formats_id', 'format_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_format', function (Blueprint $table) {
            //
        });
    }
};
