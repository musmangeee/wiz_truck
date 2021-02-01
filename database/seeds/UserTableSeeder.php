<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Admin Testing',
                'email' => 'admin@app.com',
                'device_token'=> 'device_token',
                'role' => 'admin'
            ],
            [
                'name' => 'Business Testing',
                'email' => 'business@app.com',
                'device_token'=> 'device_token',
                'role' => 'restaurant',
                'device_token' => 'dFMdZ4pFSIOS1rNcZtWue3:APA91bFAmrCeusztwU-dD0x-tmNFPRND6VPggNbhFYpDQDb_gdFbPac8XjmkyDqozWoJAEMNrqqkHNIKok6VlVMVYbY1IyGaESn7XkOXbMbQKNiclgbXw6nlnWaBO3ZWbQP25x94qSHx',
            ]
            ,
            [
                'name' => 'User Testing',
                'email' => 'user@app.com',
                'device_token'=> 'device_token',
                'role' => 'user',
                'device_token' => 'ckYU5ty0Qhe6R3r2lLa4_9:APA91bHIDi90dsPQGyM68SgydBRMB16BQbuEguJtlWrhPxk8OFQ9M4TF2Nsy--QwLceMtJ2QmpZDNxzvO_7Fa-2kWiz43s6EkhRPqZJi6l588WRBJPqahODzcd5V7BTdo9zYw6C-BG9X',
            ],
            [
                'name' => 'Rider Testing',
                'email' => 'rider@app.com',
                 'device_token'=> 'device_token',
                'role' => 'rider',
                'device_token' => 'fLixxlDDQJGtwIQYaBXkP9:APA91bHxgksa7Xh2loMsQ_3eDXMEVwCzcb1phRqDJLCcJKjfBG2OtukXaeNl46rdENdPW_q0_wWUouLAQ_LbTmmF8xxsUHRwePkbrLWHvaR2yBXiij1UNAQn4ff7-7D5oE61ruwUYaYv',
            ],
      

        ];

        foreach ($users as $user) {
            
            $u = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'device_token' => $user['device_token'],
                'password' => bcrypt('12345678'),
            ]);
            
            if (isset($user['role'])) {
                $role = \Spatie\Permission\Models\Role::findByName($user['role']);
                $u->assignRole($role);
            }

        }
    }
}
