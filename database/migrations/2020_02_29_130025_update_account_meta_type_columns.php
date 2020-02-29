<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAccountMetaTypeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('account_meta_types', function(Blueprint $table) {
            $table->text('description')->default('')->change();
        });

        Schema::table('account_meta_categories', function(Blueprint $table) {
            $table->text('description')->default('')->change();
        });

        Schema::table('privacy_levels', function(Blueprint $table) {
            $table->text('description')->default('')->change();
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
        Schema::table('account_meta_types', function(Blueprint $table) {
            $table->text('description')->default(NULL)->change();
        });

        Schema::table('account_meta_categories', function(Blueprint $table) {
            $table->text('description')->default(NULL)->change();
        });

        Schema::table('privacy_levels', function(Blueprint $table) {
            $table->text('description')->default(NULL)->change();
        });
    }
}
