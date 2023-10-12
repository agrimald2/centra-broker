<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class InsurancePolicy extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = ['number'];

    public function insurancePolicyData()
    {
        return $this->hasMany(InsurancePolicyData::class);
    }
    
    public function latestInsurancePolicyData()
    {
        return $this->hasOne(InsurancePolicyData::class)->latest();
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
