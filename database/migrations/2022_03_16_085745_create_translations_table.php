<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('translationable');
            $table->string('name','50')->nullable();
            // $table->string('type');
            $table->enum('lang', array('en', 'ar'));
            // foreignKeys
            // $table->unsignedBigInteger('amenity_id');
            // $table->foreign('amenity_id')->references('id')->on('amenities');
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
        Schema::dropIfExists('translations');
    }
}
