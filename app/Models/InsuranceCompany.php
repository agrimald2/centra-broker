<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompany extends Model
{
    use HasFactory; use softDeletes;
    protected $fillable = [
        'name',
        'isEnable',
    ];

    public function insurancePolicyData()
    {
        return $this->hasMany(InsurancePolicyData::class);
    }
}
