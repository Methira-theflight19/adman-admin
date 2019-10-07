<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutCommitteeMapCommitteecat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_committee_map_committeecat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commitee_id')->unsigned()->index();
            $table->integer('commitee_cat_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_committee_map_committeecat');
    }
}
