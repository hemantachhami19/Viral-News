<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $user = User::updateOrCreate(['id'=> 1],[
            'name' => 'root',
            'email' => 'root@admin.com',
            'password' => bcrypt('root'),
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'status' => 1
        ]);
    }
}
