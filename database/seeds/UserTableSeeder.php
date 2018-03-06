<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users=[
            [
                'name'=>'root',
                'email'=>'root@volantes.com',
                'type'=>1,
                'password'=>Hash::make('123456789')
            ]
        ];

        foreach($users as $user){
            \App\User::Create($user);
        };
    }
}
