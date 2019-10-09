<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgeMapJudgecategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_map_judgecategory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('judgr_cat_id')->unsigned()->index();
            $table->integer('judge_id')->unsigned()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('judge_map_judgecategory');
    }
}
