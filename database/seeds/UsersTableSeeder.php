<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = ['1', '2'];
        $faker = app(Faker\Generator::class);

        $users = factory(User::class)->times(50)->make();
        User::insert($users->toArray());
        $user = User::find(1);
        $user->gender = $faker->randomElement($sex);
        $user->avatar = 'http://www.gravatar.com/avatar';
        $user->openid = str_random(10);
        $user->save();
    }
}
