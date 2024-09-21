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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto Increment ID)
            $table->string('address_en')->nullable(); // ที่อยู่ภาษาอังกฤษ
            $table->string('address_jp')->nullable(); // ที่อยู่ภาษาญี่ปุ่น
            $table->json('mail')->nullable(); // เก็บหลายเมล์ในรูปแบบ JSON
            $table->json('tel')->nullable();  // เก็บหลายเบอร์โทรในรูปแบบ JSON
            $table->string('linkfacebook')->nullable(); // ลิงก์ Facebook
            $table->string('linkyoutube')->nullable();  // ลิงก์ YouTube
            $table->string('maplocation')->nullable();  // ตำแหน่งแผนที่ (Google Maps URL)
            $table->timestamps(); // Created at และ Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
};
