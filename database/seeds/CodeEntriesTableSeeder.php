<?php

use Illuminate\Database\Seeder;

class CodeEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('code_entries')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'last_sha' => 'A1B1C1D1E1F1',
        'comments' => 'First version',
        'branch_name' => 'code_init',
        'developer' => 1,
        'test_run_id' => 1,
        'approval_id' => 1,
        ]);
        DB::table('code_entries')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'last_sha' => 'A1B1C1D1E1F2',
        'comments' => 'Second version',
        'branch_name' => 'feature_one',
        'developer' => 2,
        'test_run_id' => 2,
        'approval_id' => 2,
        ]);
        DB::table('code_entries')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'last_sha' => 'A1B1C1D1E1F3',
        'comments' => 'Third version',
        'branch_name' => 'feature_two',
        'developer' => 3,
        'test_run_id' => 3,
        'approval_id' => 3,
        ]);
    }
}
