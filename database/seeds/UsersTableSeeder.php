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
            'password' => bcrypt('password'),
        ]);
    }
}

// ->each(function ($user) {
//     $user->games()->saveMany(factory(App\Game::class, 5)->make())
//     ->each(function ($game) {
//         for ($i=1; $i <= 10; $i++) {
//             $game->frames()->save(factory(App\Frame::class)->make([
//                 'number' => $i,
//             ]));
//         }
//     });
// });
