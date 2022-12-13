<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
    
        $userArr = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("Admin123"),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        User::create($userArr);
    }
}
