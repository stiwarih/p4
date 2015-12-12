<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('test_runs', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # The rest of the fields...
            $table->string('comments');
            $table->integer('tester_id');
            $table->integer('merged_up_to_master');
            $table->integer('passed');

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
        Schema::drop('test_runs');
    }
}
