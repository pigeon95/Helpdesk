<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_receiving = Role::where('name', 'receiving')->first();
        $role_declarant = Role::where('name', 'declarant')->first();

        $receiving = new User();
        $receiving->name = 'Jan Kowalski';
        $receiving->email = 'jan_kowalski@example.com';
        $receiving->password = bcrypt('123123123');
        $receiving->save();
        $receiving->roles()->attach($role_receiving);

        $declarant = new User();
        $declarant->name = 'Jerzy Nowak';
        $declarant->email = 'jerzy_nowak@example.com';
        $declarant->password = bcrypt('123123123');
        $declarant->save();
        $declarant->roles()->attach($role_declarant);
    }
}
