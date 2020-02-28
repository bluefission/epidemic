<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // $this->down();
        Schema::create('user_settings', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')
                ->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->nullable();
            $table->string('name');
            $table->string('value_string');
            $table->integer('value_int');
            $table->text('value_extra');
            $table->timestamps();
        });

        Schema::create('account_meta_types', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('account_meta_categories', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('privacy_levels', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('account_meta', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('account_meta_category_id')
                ->foreign('account_meta_category_id')
                ->references('id')->on('account_meta_categories')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('account_meta_type_id')
                ->foreign('account_meta_type_id')
                ->references('id')->on('account_meta_types')
                ->onDelete('cascade')
                ->nullable();
            $table->string('name');
            $table->string('value');
            $table->text('description');
            $table->uuid('privacy_level_id')
                ->foreign('privacy_level_id')
                ->references('id')->on('privacy_levels')
                ->onDelete('cascade')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('account_types', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('roles', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('account_role', function(Blueprint $table) {
            $table->uuid('account_id')
                ->foreign('account_id')
                ->references('id')->on('accounts')
                ->onDelete('cascade');
            $table->uuid('role_id')
                ->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')
                ->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->uuid('account_type_id')
                ->nullable()
                ->foreign('account_type_id')
                ->references('id')->on('account_types')
                ->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name')->nullable();
            
            $table->string('entitlements')
                ->nullable();
            $table->tinyInteger('status')->nullable();
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
        //
        Schema::dropIfExists('user_settings');
        Schema::dropIfExists('account_types');
        Schema::dropIfExists('account_meta_categories');
        Schema::dropIfExists('account_meta_types');
        Schema::dropIfExists('privacy_levels');
        Schema::dropIfExists('account_meta');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('account_role');
        Schema::dropIfExists('accounts');
    }
}
