<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', '=', 'admin@admin.com')->first();
        if (! $user) {
            $data = [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('coldcold')
            ];
            $user = User::create($data);

            echo 'User created successfully!';
        } else {
            echo 'User already exists!';
        }



        $memberOne = User::where('email', '=', 'kunal.sawhney@cactusglobal.com')->first();
        if (! $memberOne) {
            $dataMemberOne = [
                'name' => 'KunalS',
                'email' => 'kunal.sawhney@cactusglobal.com',
                'password' => Hash::make('kunal@sawhney')
            ];
            $userMemberOne = User::create($dataMemberOne);

            echo 'MemberOne created successfully!';
        } else {
            echo 'MemberOne already exists!';
        }

        $memberTwo = User::where('email', '=', 'krisha.mishra@cactusglobal.com')->first();
        if (! $memberTwo) {
            $dataMemberTwo= [
                'name' => 'KrishnaM',
                'email' => 'krishna.mishra@cactusglobal.com',
                'password' => Hash::make('krishna@mishra')
            ];
            $userMemberTwo = User::create($dataMemberTwo);

            echo 'MemberTwo created successfully!';
        } else {
            echo 'MemberTwo already exists!';
        }

    }
}
