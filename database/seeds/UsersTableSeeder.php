<?php

use App\User;
use App\UserInfo;
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
        $user=User::create([
            'username'=>'SuperAdmin',
            'fname'=>'Admin',
            'lname'=>'Super',
            'email'=>'admin@laragram.com',
            'password'=>bcrypt('admin'),
            'college_id'=>'1',
        ]);
        $user->attachRole('super_admin');
        UserInfo::create([
            'user_id'=>$user->id
        ]);

        $user2=User::create([
            'username'=>'Admin',
            'fname'=>'User',
            'lname'=>'Name',
            'email'=>'user@laragram.com',
            'password'=>bcrypt('user'),
            'college_id'=>'1',
        ]);
        $user2->attachRole('user');
        UserInfo::create([
            'user_id'=>$user2->id
        ]);
        for ($i=0; $i <30 ; $i++) {
            $user0=factory('App\User')->create();
            $user0->attachRole('user');
            UserInfo::create([
                'user_id'=>$user0->id
            ]);
        }
    }
}
