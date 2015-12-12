<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('code_entries', function (Blueprint $table) {

            /*
            (int, primary key, auto_increment) id
            (timestamp) created_at
            (timestamp) updated_at
            (int, foreign key) developer
            (text) last_sha
            (text) comments
            (int, foreign key) test_run_id
            (int, foreign key) approval_id
            */

            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the fields...
            $table->string('last_sha');
            //$table->integer('files_changed');
            $table->string('comments');
            $table->string('branch_name');

            # These are foreign keys
            $table->integer('developer');
            $table->integer('test_run_id');
            $table->integer('approval_id');

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
        Schema::drop('code_entries');
    }
}
