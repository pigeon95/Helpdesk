<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_receiving = new Role();
        $role_receiving->name = 'receiving';
        $role_receiving->description = 'Osoba odbierająca zgłoszenia';
        $role_receiving->save();
        $role_declarant = new Role();
        $role_declarant->name = 'declarant';
        $role_declarant->description = 'Osoba zgłaszająca zadania';
        $role_declarant->save();
    }
}
