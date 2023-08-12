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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->integer("income_id");
            $table->string("number")->nullable();
            $table->date("date");
            $table->date("last_change_date");
            $table->string("supplier_article");
            $table->string("tech_size");
            $table->string("barcode");
            $table->integer("quantity");
            $table->integer("total_price");
            $table->date("date_close");
            $table->string("warehouse_name")->nullable();
            $table->integer("nm_id");
            $table->string("status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
