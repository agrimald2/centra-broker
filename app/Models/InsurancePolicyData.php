<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class InsurancePolicyData extends Model
{
    use HasFactory; use SoftDeletes;

    protected $table = 'insurance_policy_data';

    protected $fillable = [
        'insurance_policy_id',
        'customer_id',
        'insurance_policies_status_id',
        'insurance_company_id',
        'start_date',
        'end_date',
        'comission_type_id',
        'comission',
        'comission_total',
        'number_of_installments',
        'risk_rate',
    ];

    public function insurancePolicy()
    {
        return $this->belongsTo(InsurancePolicy::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function insurancePoliciesStatus()
    {
        return $this->belongsTo(InsurancePoliciesStatus::class);
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function insurancePolicyPeople()
    {
        return $this->hasMany(InsurancePolicyPeople::class);
    }

    public function getComissionTypes(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Porcentaje %'
            ],
            [
                'id' => 2,
                'name' => 'Numérico'
            ]
        ];
    }

    public function getComissionTypeName(): ?string
    {
        $comissionTypeId = $this->comission_type_id;
        foreach (self::getComissionTypes() as $type) {
            if ($type['id'] === $comissionTypeId) {
                return $type['name'];
            }
        }
        return null;
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function totalComission()
    {
        if ($this->comission_type_id == 2) {
            return $this->comission;
        } else {
            return $this->assets->sum(function ($asset) {
                return $asset->netPremium() * $this->comission/100;
            });
        }
    }

    public function netPremiumTotal()
    {
        if ($this->comission_type_id == 2) { 
            return $this->comission;
        } else {
            return $this->assets->sum(function ($asset) {
                return $asset->netPremium();
            });
        }
    }
    
    public function netTotal()
    {
        return $this->assets->sum(function ($asset) {
            return $asset->netTotal();
        });
    }
}
