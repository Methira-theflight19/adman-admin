<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsubMapAward extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awardsub_map_award', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('award_sub_cat_id')->unsigned()->index();
            $table->integer('award__id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awardsub_map_award');
    }
}
