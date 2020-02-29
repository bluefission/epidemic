<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuildOutbreakTypeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('outbreak_types', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('parent_type_id')
                ->foreign('parent_type_id')
                ->references('id')->on('outbreak_types')
                ->onDelete('cascade')
                ->nullable();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('outbreaks', function (Blueprint $table) {
            $table->uuid('transmission_type_id')
                ->foreign('transmission_type_id')
                ->references('id')->on('outbreak_transmission_types')
                ->onDelete('cascade')
                ->nullable()
                ->after('outbreak_type_id');
        });

        Schema::create('outbreak_symptom', function(Blueprint $table) {
            $table->uuid('outbreak_id')
                ->foreign('outbreak_id')
                ->references('id')->on('outbreaks')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('symptom_id')
                ->foreign('symptom_id')
                ->references('id')->on('symptoms')
                ->onDelete('cascade')
                ->nullable();
        });

        Schema::create('outbreak_outbreak_meta', function(Blueprint $table) {
            $table->uuid('outbreak_id')
                ->foreign('outbreak_id')
                ->references('id')->on('outbreaks')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('meta_id')
                ->foreign('meta_id')
                ->references('id')->on('outbreak_meta')
                ->onDelete('cascade')
                ->nullable();
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
        Schema::dropIfExists('outbreak_types');
        Schema::dropIfExists('outbreak_symptom');
        Schema::dropIfExists('outbreak_outbreak_meta');
        Schema::table('outbreaks', function (Blueprint $table) {
            $table->dropColumn('transmission_type_id');
        });
    }
}
