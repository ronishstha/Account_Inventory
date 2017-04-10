<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "ronish";
        $user->email = "ronish@inventory.com";
        $user->password = bcrypt('iamronish');
        $user->save();
    }
}
