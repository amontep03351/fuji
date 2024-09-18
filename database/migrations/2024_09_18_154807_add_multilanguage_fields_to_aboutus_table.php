<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultilanguageFieldsToAboutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aboutus', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('title_jp')->nullable()->after('title_en');
            $table->text('description_en')->nullable()->after('description');
            $table->text('description_jp')->nullable()->after('description_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aboutus', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_jp', 'description_en', 'description_jp']);
        });
    }
}
