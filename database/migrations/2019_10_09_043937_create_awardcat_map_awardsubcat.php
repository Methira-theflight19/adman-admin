<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardcatMapAwardsubcat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awardcat_map_awardsubcat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('award_sub_cat_id')->unsigned()->index();
            $table->integer('award_cat_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awardcat_map_awardsubcat');
    }
}
