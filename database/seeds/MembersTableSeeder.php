<?php

use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = factory(Member::class)->times(20)->make();
        Member::insert($member->makeVisible(['openid'])->toArray());

        $member = Member::find(1);
        $member->name = 'Aufree';
        $member->gender = rand(1,2);
        $member->avatar = (10);
        $member->openid = str_random(10);
        $member->save();
    }
}
