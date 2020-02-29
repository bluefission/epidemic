<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //https://laracasts.com/discuss/channels/laravel/pivot-table-extra-field

        Schema::create('protocol_qualification', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('protocol_id')
                ->foreign('protocol_id')
                ->references('id')->on('protocols')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('qualification_id');
            $table->timestamps();
        });

        Schema::create('protocol_question_qualification', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('protocol_question_id')
                ->foreign('protocol_question_id')
                ->references('id')->on('protocol_questions')
                ->onDelete('cascade')
                ->nullable();
            $table->uuid('qualification_id');
            $table->timestamps();
        });

        Schema::create('protocol_conditions', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('operator');
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
        Schema::dropIfExists('protocol_qualification');
        Schema::dropIfExists('protocol_question_qualification');
        Schema::dropIfExists('protocol_conditions');

    }
}
