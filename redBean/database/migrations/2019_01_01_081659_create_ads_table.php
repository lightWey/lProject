<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->tinyInteger('type')->unsigned()->default(1);
            $table->unsignedDecimal('once',10,4);
            $table->integer('used')->unsigned()->default(0);
            $table->string('url')->nullable(true);
            $table->string('name');
            $table->string('remark')->nullable(true);

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
        Schema::dropIfExists('ads');
    }
}
