<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoload', function (Blueprint $table) {
            $table->id();
            $table->string('A_2G');
            $table->string('A_3G');
            $table->string('A_4G');
            $table->string('C_2G');
            $table->string('C_3G');
            $table->string('C_4G');
            $table->string('ne');
            $table->string('site');
            $table->string('rtpo');
            $table->string('last_update');
            $table->string('total_impact_ne');
            $table->string('total_impact_site');
            $table->string('total_sysinfo_ne');
            $table->string('total_sysinfo_site');
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
