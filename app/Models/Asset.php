<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\GeneralSetting;
use App\Models\AssetsAttributesData;
use Log;

class Asset extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = [
        'asset_type_id',
        'insurance_policy_data_id',
        'insured_amount',
        'insuranced_people',
        'vigency_date',
        'insured_amount_type',
        'risk_rate',
        'fix_net_premium',
    ];

    public function assetType()
    {
        return $this->belongsTo(AssetsType::class);
    }

    public function insurancePolicyData()
    {
        return $this->belongsTo(InsurancePolicyData::class);
    }

    public function assetsAttributesData()
    {
        return $this->hasMany(AssetsAttributesData::class);
    }

    
    public function customer()
    {
        if ($this->insurancePolicyData) {
            return $this->insurancePolicyData()->orderBy('created_at', 'desc')->first()->customer;
        }
        return null; // or any other default value
    }
        
    public function insurancePolicy()
    {
        if ($this->insurancePolicyData) {
            return $this->insurancePolicyData()->orderBy('created_at', 'desc')->first()->insurancePolicy;
        }
        return null; // or any other default value
    }

    public function netPremium()
    {
        /**
         * Insuranced_amount * risk_rate
        */
        if ($this->insurancePolicyData) {
            $calculated_net_premium = $this->insured_amount * ($this->insurancePolicyData->risk_rate/100);
            $fix_net_premium = $this->fix_net_premium;
            return $calculated_net_premium + $fix_net_premium;
        }
        return 2.8; // or any other default value
    }

    public function netComercial()
    {
        /**
         * netPremium + (netPremium * right_of_emission)
        */
        $right_of_emission = GeneralSetting::first()->right_of_emission;
        $netPremium = $this->netPremium();
        return $netPremium + ($netPremium * ($right_of_emission/100));
    }
    
    public function netTotal(){
        /**
         * netComercial + (netComercial * igv)
        */
        $igv = GeneralSetting::first()->igv;
        $netComercial = $this->netComercial();
        return $netComercial + ($netComercial * ($igv/100));
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function riskType()
    {
        return $this->belongsTo(RiskType::class);
    }
}