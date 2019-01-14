<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdSchemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_schemas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unsigned();
            $table->string('name');
            $table->tinyInteger('status')->default(1);
            $table->integer('total');
            $table->tinyInteger('random');
            $table->unsignedTinyInteger('type');
            $table->timestamps();
            $table->timestamp('ctime')->nullable(true);
            $table->timestamp('etime')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_schemas');
    }
}
