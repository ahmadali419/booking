<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();
    
        $serviceArr = [
            
            ['name' => 'Junk removal'],
           ['name' => 'Donation Items'],
        ];
        Service::insert($serviceArr);
    }
}
