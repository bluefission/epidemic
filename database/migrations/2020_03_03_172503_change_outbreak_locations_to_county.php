<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOutbreakLocationsToCounty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Doctrine\DBAL\Types\Type::addType('uuid', 'Ramsey\Uuid\Uuid');
        Schema::table('outbreak_confirmations', function (Blueprint $table) {
            //
            $table->uuid('location_id')
                ->dropForeign('outbreak_confirmations_location_id_foreign')
                ->change();

            $table->uuid('location_id')
                ->foreign('county_id')
                ->references('id')->on('counties')
                ->onDelete('cascade')
                ->change();

            $table->renameColumn('location_id', 'county_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Doctrine\DBAL\Types\Type::addType('uuid', 'Ramsey\Uuid\Uuid');
        Schema::table('outbreak_confirmations', function (Blueprint $table) {
            //
            $table->uuid('county_id')
                ->dropForeign('outbreak_confirmations_county_id_foreign')
                ->change();
                
            $table->uuid('county_id')
                ->foreign('location_id')
                ->references('id')->on('locations')
                ->onDelete('cascade')
                ->change();

            $table->renameColumn('county_id', 'location_id');
        });
    }
}
