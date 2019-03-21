<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->unsignedInteger('show')->default(0);
            $table->unsignedInteger('click')->default(0);
            $table->unsignedDecimal('count', 12, 4)->default(0);
            $table->index(['user_id','day']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumes');
    }
}
