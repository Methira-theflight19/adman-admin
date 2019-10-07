<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateaboutchairmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutchairman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image',191);
            $table->text('content')->nullable();
            $table->string('message_image',191)->nullable();
            $table->text('message_content')->nullable();
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
        Schema::dropIfExists('aboutchairman');
    }
}
