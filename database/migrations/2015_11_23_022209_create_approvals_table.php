<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('approvals', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # The rest of the fields...
            $table->string('comments');
            $table->integer('approver_id');
            $table->integer('test_run_id');
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
        Schema::drop('approvals');
    }
}
