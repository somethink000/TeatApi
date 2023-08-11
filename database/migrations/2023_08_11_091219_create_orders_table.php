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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("g_number");
            $table->dateTime("date");
            $table->dateTime("last_change_date");
            $table->string("supplier_article");
            $table->string("tech_size");
            $table->integer("barcode");
            $table->integer("total_price");
            $table->integer("discount_percent");
            $table->string("warehouse_name");
            $table->string("oblast");
            $table->integer("income_id");
            $table->integer("odid");
            $table->integer("nm_id");
            $table->string("subject");
            $table->string("category");
            $table->string("brand");
            $table->integer("is_cancel");
            $table->date("cancel_dt");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
