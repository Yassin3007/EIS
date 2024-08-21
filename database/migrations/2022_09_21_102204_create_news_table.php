<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('pref_en');
            $table->string('pref_ar');
            $table->text('content_en');
            $table->text('content_ar');
            $table->text('image')->nullable();
            $table->string('type')->nullable();
            // $table->enum('lang', array('en', 'ar'));
            // foreignKeys
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
