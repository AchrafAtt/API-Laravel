<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //*create 10 users
        $users = User::factory(10)->create();
        
        //*use the users to create 100 tickets by recycling the users
        Ticket::factory(100)->recycle($users)->create();
    } 
}
