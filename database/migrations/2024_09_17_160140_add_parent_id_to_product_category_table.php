<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_category', function (Blueprint $table) {
            // เพิ่มคอลัมน์ parent_id
            $table->unsignedBigInteger('parent_id')->nullable()->after('id');
            
            // สร้าง foreign key constraint สำหรับ parent_id
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('product_category')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_category', function (Blueprint $table) {
            // ลบ foreign key constraint
            $table->dropForeign(['parent_id']);
            
            // ลบคอลัมน์ parent_id
            $table->dropColumn('parent_id');
        });
    }
};
