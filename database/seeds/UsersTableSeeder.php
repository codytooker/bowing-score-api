<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user that we can use
        factory(App\User::class)->create([
            'name' => 'cody',
            'email' => 'cody@cody.com',
            'password' => bcrypt('cody'),
        ]);
    }
}
