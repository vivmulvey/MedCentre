<?php

use Illuminate\Database\Seeder;
use App\InsuranceCompany;

class InsuranceCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $insurance_company = new InsuranceCompany();
      $insurance_company->name = "Laya Health Care";
      $insurance_company->address = "Block B , 12 SandyFord Industrial Estate";
      $insurance_company->post_code = "A654RT72";
      $insurance_company->phone_number = "0126785567";
      $insurance_company->email = "layahealthcare@info.ie";
      $insurance_company->save();

      $insurance_company = new InsuranceCompany();
      $insurance_company->name = "TopHealth Insurance";
      $insurance_company->address = "40A Leeson Street , Dublin 4";
      $insurance_company->post_code = "P00L7H67";
      $insurance_company->phone_number = "012784590";
      $insurance_company->email = "info@thi.ie";
      $insurance_company->save();

      $insurance_company = new InsuranceCompany();
      $insurance_company->name = "Irish Health Insurance";
      $insurance_company->address = "Manor House , Grangegorman";
      $insurance_company->post_code = "908YU4R";
      $insurance_company->phone_number = "012569905";
      $insurance_company->email = "irishhealthinsurance@ihi.ie";
      $insurance_company->save();

      
        factory(App\InsuranceCompany::class,15)->create();

    }
}
