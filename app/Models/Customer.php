<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'document_number',
        'document_type_id',
        'customer_type_id',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }
    
    public function insurancePolicyData()
    {
        return $this->hasMany(InsurancePolicyData::class);
    }
}