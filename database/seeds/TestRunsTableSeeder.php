<?php

use Illuminate\Database\Seeder;

class TestRunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('test_runs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'comments' => 'First version Tested',
        'tester_id' => 1,
        'merged_up_to_master' => 'Yes',
        'passed' => 1,
        ]);
        DB::table('test_runs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'comments' => 'Second version Tested',
        'tester_id' => 2,
        'merged_up_to_master' => 'Yes',
        'passed' => 1,
        ]);
        DB::table('test_runs')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'comments' => 'Third version Tested',
        'tester_id' => 3,
        'merged_up_to_master' => 'Yes',
        'passed' => 1,
        ]);
    }
}
