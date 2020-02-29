<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountPivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_account_meta', function (Blueprint $table) {
            $table->uuid('account_id')
                ->foreign('account_id')
                ->references('id')->on('accounts')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('meta_id')
                ->foreign('meta_id')
                ->references('id')->on('account_meta')
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
        Schema::dropIfExists('account_account_meta');
    }
}
