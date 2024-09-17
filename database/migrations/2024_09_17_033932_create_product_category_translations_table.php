<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_translations', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('product_category_id')->constrained('product_category')->onDelete('cascade'); // Foreign Key to `product_category`
            $table->string('locale'); // ภาษา เช่น 'en' หรือ 'jp'
            $table->string('name'); // ชื่อของหมวดหมู่สินค้า
            $table->text('description')->nullable(); // คำอธิบายของหมวดหมู่สินค้า
            $table->timestamps(); // Created at และ Updated at timestamps

            $table->unique(['product_category_id', 'locale']); // Unique constraint to avoid duplicate translations
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category_translations');
    }
}
