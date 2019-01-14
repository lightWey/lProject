<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRealToAdStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_stats', function (Blueprint $table) {
            $table->tinyInteger('real')->default(1);
            $table->index('created_at');
            $table->index('real');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_stats', function (Blueprint $table) {
            $table->dropColumn('real');
        });
    }
}
