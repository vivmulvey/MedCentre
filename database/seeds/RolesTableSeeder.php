<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = New Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save();

        $role_user = New Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();

        $role_doctor = New Role();
        $role_doctor->name = 'doctor';
        $role_doctor->description = 'A doctor';
        $role_doctor->save();

        $role_patient = New Role();
        $role_patient->name = 'patient';
        $role_patient->description = 'A patient';
        $role_patient->save();
    }
}
