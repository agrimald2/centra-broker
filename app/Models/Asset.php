<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\GeneralSetting;
use App\Models\AssetsAttributesData;

class Asset extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = [
        'asset_type_id',
        'insurance_policy_data_id',
        'insured_amount',
        'vigency_date',
    ];

    public function assetType()
    {
        return $this->belongsTo(AssetType::class);
    }

    public function insurancePolicyData()
    {
        return $this->belongsTo(InsurancePolicyData::class);
    }

    public function assetsAttributesData()
    {
        return $this->hasMany(AssetsAttributesData::class);
    }

    public function netPremium()
    {
        /**
         * Insuranced_amount * risk_rate
        */
        return $this->insured_amount * ($this->insurancePolicyData->risk_rate/100);
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
}