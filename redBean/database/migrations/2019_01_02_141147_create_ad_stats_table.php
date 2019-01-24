<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unsigned();
            $table->integer('ad_schema_id')->default(0)->unsigned();
            $table->unsignedDecimal('cons',12,4);
            $table->text('referer')->nullable(true);
            $table->string('ip')->default('');
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
        Schema::dropIfExists('ad_stats');
    }
}
