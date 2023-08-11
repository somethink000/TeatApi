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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->date("last_change_date");
            $table->string("supplier_article");
            $table->string("tech_size");
            $table->integer("barcode");
            $table->integer("quantity");
            $table->integer("is_supply");
            $table->integer("is_realization");
            $table->integer("quantity_full");
            $table->string( "warehouse_name");
            $table->integer("in_way_to_client");
            $table->integer("in_way_from_client");
            $table->integer("nm_id");
            $table->string("subject");
            $table->string("category");
            $table->string("brand");
            $table->string("sc_code");
            $table->integer("price");
            $table->integer("discount");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
