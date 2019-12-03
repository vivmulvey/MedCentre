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
      $user = new User();
      $user->name = 'Sam Kenny';
      $user->email = 'skenny@medicalcentre.ie';
      $user->address = ('78 Bakers Road , Deansgrange');
      $user->post_code = ('A996T5H8');
      $user->phone_number = ('0876182463');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_doctor);

      $doctor = new Doctor();
      $doctor->user_id = $user->id;
      $doctor->start_date = '2000/06/06';
      $doctor->expertise = 'Surgeon';
      $doctor->save();


      //User Model - Patient
      $user = new User();
      $user->name = 'Laura Glynn';
      $user->email = 'lglynn@medicalcentre.ie';
      $user->address = ('90 Olivers Way , Blackrock');
      $user->post_code = ('A94C2W6');
      $user->phone_number = ('0864428756');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_patient);

      $patient = new Patient();
      $patient->user_id = $user->id;
      $patient->policy_number = '7292518629009';
      $patient->insurance_company_id = '1';
      $patient->save();



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
