<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banner_name', 191);
            $table->string('banner_picture', 191);
            $table->string('banner_picture_sm', 191)->nullable();
            $table->boolean('banner_list')->default(0);
            $table->string('seo_title', 191)->nullable();
            $table->string('seo_alt', 191)->nullable();
            $table->text('seo_description', 191)->nullable();
            $table->string('link', 191)->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('banners');
    }
}
