<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'insurance_policy_id', 'path'];

    public function insurancePolicy()
    {
        return $this->belongsTo(InsurancePolicy::class);
    }
}
