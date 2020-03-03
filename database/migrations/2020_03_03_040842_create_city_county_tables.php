<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityCountyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('county_id')
                ->foreign('county_id')
                ->references('id')->on('counties')
                ->onDelete('cascade')
                ->nullable();;
            $table->string('name');
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::create('counties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('region_id')
                ->foreign('region_id')
                ->references('id')->on('regions')
                ->onDelete('cascade')
                ->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('abbreviation')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('abbreviation')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });

        Schema::table('addresses', function(Blueprint $table) {
            // $table->renameColumn('city', 'city_id');
            // $table->renameColumn('region', 'region_id');
            // $table->renameColumn('country', 'country_id');

            // $table->uuid('city_id')
            //     ->foreign('city_id')
            //     ->references('id')->on('cities')
            //     ->onDelete('cascade')
            //     ->change();
            // $table->uuid('region_id')
            //     ->foreign('region_id')
            //     ->references('id')->on('regions')
            //     ->onDelete('cascade')
            //     ->change();
            // $table->uuid('country_id')
            //     ->foreign('country_id')
            //     ->references('id')->on('countries')
            //     ->onDelete('cascade')
            //     ->change();

            $table->uuid('city_id')
                ->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade')
                ->after('city');
            $table->uuid('region_id')
                ->foreign('region_id')
                ->references('id')->on('regions')
                ->onDelete('cascade')
                ->after('region');
            $table->uuid('country_id')
                ->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade')
                ->after('country');

            $table->dropColumn(['city', 'region', 'country']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('counties');
        Schema::dropIfExists('regions');

        Schema::table('addresses', function(Blueprint $table) {
            $table->string('city_id')
                ->dropForeign('addresses_city_id_foreign')
                ->change();
            $table->string('region_id')
                ->dropForeign('addresses_region_id_foreign')
                ->change();
            $table->string('country_id')
                ->dropForeign('addresses_country_id_id_foreign')
                ->change();

            $table->renameColumn('city_id', 'city');
            $table->renameColumn('region_id', 'region');
            $table->renameColumn('country_id', 'country');
        });
    }
}
