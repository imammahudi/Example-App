<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->string('class');
            $table->string('duration');
            $table->string('ne');
            $table->string('ne_id');
            $table->string('site_name');
            $table->string('site_impact');
            $table->string('site_sysinfo');
            $table->string('d_2G');
            $table->string('d_3G');
            $table->string('d_4G');
            $table->string('kabupaten');
            $table->string('c_2G');
            $table->string('c_3G');
            $table->string('c_4G');
            $table->string('rtpo');
            $table->string('last_update');
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
        //
    }
}
