<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('checkin_id')
                ->unsigned()
                ->foreign('checkin_id')
                ->references('id')->on('checkins')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('question_id')
                ->unsigned()
                ->foreign('question_id')
                ->references('id')->on('protocol_questions')
                ->onDelete('cascade')
                ->nullable();
            $table->string('response');
            $table->timestamps();
        });

        Schema::create('checkins', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')
                ->unsigned()
                ->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('protocol_id')
                ->unsigned()
                ->foreign('protocol_id')
                ->references('id')->on('protocols')
                ->onDelete('cascade')
                ->nullable();
            $table->timestamp('datetime');
            $table->timestamps();
        });

        Schema::create('protocols', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('protocol_type_id')
                ->unsigned()
                ->foreign('protocol_type_id')
                ->references('id')->on('protocol_types')
                ->onDelete('cascade')
                ->nullable();
            $table->string('name');
            $table->text('description');
            $table->tinyInt('is_random');
            $table->timestamps();
        });

        Schema::create('protocol_types', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); //ecological, case series, cross sectional, case control, cohort, interventional
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('protocol_questions', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('protocol_id')
                ->unsigned()
                ->foreign('protocol_id')
                ->references('id')->on('protocols')
                ->onDelete('cascade')
                ->nullable();
            $table->string('question');
            $table->integer('ordinance');
            $table->tinyInt('is_random');
            $table->timestamps();
        });

        Schema::create('protocol_question_options', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('protocol_question_id')
                ->unsigned()
                ->foreign('protocol_question_id')
                ->references('id')->on('protocol_questions')
                ->onDelete('cascade')
                ->nullable();
            $table->string('option');
            $table->integer('ordinance');
            $table->timestamps();
        });

        Schema::create('protocol_conditions', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); //ecological, case series, cross sectional, case control, cohort, interventional
            $table->text('description');
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
        Schema::dropIfExists('responses');
        Schema::dropIfExists('checkins');
        Schema::dropIfExists('protocols');
        Schema::dropIfExists('protocol_questions');
        Schema::dropIfExists('protocol_question_options');
        Schema::dropIfExists('protocol_types');
    }
}
