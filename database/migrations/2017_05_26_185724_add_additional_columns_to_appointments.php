<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalColumnsToAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('address');
            $table->string('city');
            $table->string('postalCode');
            $table->string('phoneNum');
            $table->string('appMonth');
            $table->string('appDay');
            $table->string('details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('postalCode');
            $table->dropColumn('phoneNum');
            $table->dropColumn('appMonth');
            $table->dropColumn('appDay');
            $table->dropColumn('details');
        });
    }
}
