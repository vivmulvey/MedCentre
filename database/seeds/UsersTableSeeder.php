<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Doctor;
use App\Patient;
use App\InsuranceCompany;

class UsersTableSeeder extends Seeder
{

  private $amountOfInsuranceCompanies = 0;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();

      //User Model - Admin
      $admin = new User();
      $admin->name = 'Viv';
      $admin->email = 'viv@medicalcentre.ie';
      $admin->address =('13 Carysfor Avenue , Blackrock');
      $admin->post_code = ('A87VH6T');
      $admin->phone_number = ('087675229');
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      //User Model - User
      $user = new User();
      $user->name = 'John jones';
      $user->email = 'johnj@medicalcentre.ie';
      $user->address = ('12 Main Street , Stillorgan');
      $user->post_code = ('A95T4R2');
      $user->phone_number = ('0861192271');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Andy Ryan';
      $user->email = 'andyR@medicalcentre.ie';
      $user->address = ('33 Johnstown Park , Firhouse');
      $user->post_code = ('A76P00Y5');
      $user->phone_number = ('0878853721');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Mary Smith';
      $user->email = 'marysmith@medicalcentre.ie';
      $user->address = ('18A Smithfield Park , Swords');
      $user->post_code = ('B3988h1');
      $user->phone_number = ('0876641086');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      //User Model - Doctor
      $doctor = new User();
      $doctor->name = 'Sam Kenny';
      $doctor->email = 'skenny@medicalcentre.ie';
      $doctor->address = ('78 Bakers Road , Deansgrange');
      $doctor->post_code = ('A996T5H8');
      $doctor->phone_number = ('0876182463');
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      //User Model - Patient
      $patient = new User();
      $patient->name = 'Laura Glynn';
      $patient->email = 'lglynn@medicalcentre.ie';
      $patient->address = ('90 Olivers Way , Blackrock');
      $patient->post_code = ('A94C2W6');
      $patient->phone_number = ('0864428756');
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);



      //Creating Patients

       $this->amountOfInsuranceCompanies = InsuranceCompany::count();

       factory(App\User::class, 20)->create()->each(function($user){
         $user->roles()->attach(Role::where('name' , 'patient')->first());

         factory(App\Patient::class)->create([
           'user_id' => $user->id,
           'insurance_company_id' => function() { return mt_rand(1, $this->amountOfInsuranceCompanies); }
           ]);
         });

       //Creating Doctors


      factory(App\User::class, 20)->create()->each(function($user){
        $user->roles()->attach(Role::where('name' , 'doctor')->first());

         factory(App\Doctor::class)->create([
           'user_id' => $user->id
         ]);

      });
    }
}
