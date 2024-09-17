<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisplayOrderToProductCategoryTable extends Migration
{
    public function up()
    {
        Schema::table('product_category', function (Blueprint $table) {
            $table->integer('display_order')->default(0)->after('id');
        });
    }

    public function down()
    {
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropColumn('display_order');
        });
    }
}
