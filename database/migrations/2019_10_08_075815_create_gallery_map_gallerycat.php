<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryMapGallerycat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_map_gallerycat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned()->index();
            $table->integer('gallery_cat_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_map_gallerycat');
    }
}
