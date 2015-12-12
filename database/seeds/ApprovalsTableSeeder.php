<?php

use Illuminate\Database\Seeder;

class ApprovalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('approvals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'comments' => 'First version approved',
        'approver_id' => 1,
        'test_run_id' => 1,
        ]);

        DB::table('approvals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'comments' => 'Second version approved',
        'approver_id' => 2,
        'test_run_id' => 2,
        ]);

        DB::table('approvals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'comments' => 'Third version approved',
        'approver_id' => 3,
        'test_run_id' => 3,
        ]);
        //
    }
}
