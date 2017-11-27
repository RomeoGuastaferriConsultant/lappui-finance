<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin user
        $this->createUser('admin', 1, 1, 'bogus1@bogus.com', 'adminLappui720');

        // create other roles
        $this->createUser('test national',  2,  1, 'bogus2@bogus.com', 'passnational');
        $this->createUser('test regional',  3, 15, 'bogus3@bogus.com', 'passregional');
        $this->createUser('test organisme', 4, 15, 'bogus4@bogus.com', 'passorganisme');
    }

    private function createUser($name, $role, $region, $email, $password)
    {
        DB::table('users')->insert([
            'name' => $name,
            'role' => $role,
            'region' => $region,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }
}
