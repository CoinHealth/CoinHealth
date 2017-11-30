<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'subscriber',
                'display_name' => 'Subscriber',
                'description' => 'Subscriber or the owner of the CRM'
            ],
            [
                'name' => 'normal',
                'display_name' => 'Normal User',
                'description' => 'a normal careparrot user',
            ],

            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'an Admin of CareParrot',
            ],
        ];

        foreach($roles as $role) {
            Role::create($role);
        }
    }
}
