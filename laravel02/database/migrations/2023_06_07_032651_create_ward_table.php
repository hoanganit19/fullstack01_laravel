<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward', function (Blueprint $table) {
            $table->increments('id');
            $table->string('_name', 50);
            $table->string('_prefix', 20)->nullable();
            $table->unsignedInteger('_province_id')->nullable();
            $table->unsignedInteger('_district_id')->nullable();

            $table->index(['_province_id', '_district_id'], '_province_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ward');
    }
};
