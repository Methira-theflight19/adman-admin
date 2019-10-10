<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchiveMapAchiveSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achive_map_achive_sub_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('achive_sub_cat_id')->unsigned()->index();
            $table->integer('achive_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achive_map_achive_sub_category');
    }
}
