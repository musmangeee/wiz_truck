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
                
                'role' => 'admin'
            ],
            [
                'name' => 'Business Testing',
                'email' => 'business@app.com',
                
                'role' => 'restaurant'
            ]
            ,
            [
                'name' => 'User Testing',
                'email' => 'user@app.com',
                
            ],
            [
                'name' => 'Rider Testing',
                'email' => 'rider@app.com',
               
                'role' => 'rider'
            ],
        ];

        foreach ($users as $user) {
            $u = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
               
                
                'password' => bcrypt('Pa$$w0rd!'),
            ]);
            if (isset($user['role'])) {
                $role = \Spatie\Permission\Models\Role::findByName($user['role']);
                $u->assignRole($role);
            }

        }
    }
}
