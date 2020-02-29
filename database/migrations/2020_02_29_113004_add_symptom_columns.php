<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSymptomColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('symptoms', function (Blueprint $table) {
            $table->text('description')
                ->after('icd10');
        });

        Schema::table('outbreaks', function(Blueprint $table) {
            $table->integer('r0_rating')->nullable()->change();
            $table->integer('virulence')->nullable()->change();
            $table->integer('fatality_rate')->nullable()->change();
            $table->datetime('zero_day')->nullable()->change();
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
        Schema::table('symptoms', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('outbreaks', function(Blueprint $table) {
            $table->integer('r0_rating')->nullable(false)->change();
            $table->integer('virulence')->nullable(false)->change();
            $table->integer('fatality_rate')->nullable(false)->change();
            $table->datetime('zero_day')->nullable(false)->change();
        });
    }
}
