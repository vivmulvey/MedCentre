<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{

  //public $table = 'insurance_company';

  public function patients(){
    return $this->hasMany('App\Patient');
  }
}
