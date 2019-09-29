<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 20)->create();

        $users = [1 => 'user', 2 => 'moderator', 3 => 'admin'];

        foreach ($users as $key => $value) {
            User::create([
                'role_id' => $key,
                'is_active' => 1,
                'name' => $value,
                'email' => $value . '@gmail.com',
                'password' => bcrypt('secret'),
                'file' => 'default-welcomer.png',
            ]);
        }
    }
}
