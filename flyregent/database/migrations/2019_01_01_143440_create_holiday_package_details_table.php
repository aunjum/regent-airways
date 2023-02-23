<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidayPackageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_package_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('holiday_package_id');
            $table->string('hotel');
            $table->longText('packages');

            $table->foreign('holiday_package_id')->references('id')->on('holiday_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday_package_details');
    }
}
