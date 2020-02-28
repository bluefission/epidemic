<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutbreakTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('outbreaks', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('outbreak_type_id')
                ->unsigned()
                ->foreign('outbreak_type_id')
                ->references('id')->on('outbreak_types')
                ->onDelete('cascade')
                ->nullable();
            $table->string('name');
            $table->string('icd10');
            $table->integer('r0_rating');
            $table->integer('virulence');
            $table->integer('fatality_rate');
            $table->timestamp('zero_day');
            $table->uuid('status_id')
                ->unsigned()
                ->foreign('status_id')
                ->references('id')->on('statuses')
                ->onDelete('cascade')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('symptoms', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('name');
            $table->string('icd10');
        });

        Schema::create('treatments', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
             $table->uuid('type_id')
                ->unsigned()
                ->foreign('type_id')
                ->references('id')->on('treatment_types')
                ->onDelete('cascade')
                ->nullable();
            $table->text('description');
            $table->integer('score');
            $table->timestamps();
        });

        Schema::create('treatments_types', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('outbreak_meta', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('outbreak_statuses', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('outbreak_transmission_types', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('outbreak_confirmations', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('outbreak_id')
                ->unsigned()
                ->foreign('outbreak_id')
                ->references('id')->on('outbreaks')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('location_id')
                ->unsigned()
                ->foreign('location_id')
                ->references('id')->on('locations')
                ->onDelete('cascade')
                ->nullable();
            $table->timestamp('datetime');
            $table->timestamps();
        });

        Schema::create('locations', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
        });

        Schema::create('addresses', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->string('city');
            $table->string('region');
            $table->string('postal_code');
            $table->string('country');

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
        Schema::dropIfExists('outbreaks');
        Schema::dropIfExists('symptoms');
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('treatment_types');
        Schema::dropIfExists('outbreak_meta');
        Schema::dropIfExists('outbreak_statuses');
        Schema::dropIfExists('outbreak_transmission_types');
        Schema::dropIfExists('outbreak_confirmations');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('addresses');
    }
}
