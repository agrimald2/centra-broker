<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsurancePolicyPeople extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'insurance_policy_people';

    protected $fillable = [
        'name',
        'document_type_id',
        'document_number',
        'type_id',
        'insurance_policy_data_id'
    ];

    public function getTypes(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'RESPONSABLE DE PAGO'
            ],
            [
                'id' => 2,
                'name' => 'ASEGURADO'
            ]
        ];
    }


    public function getTypeName(): ?string
    {
        $typeId = $this->type_id;
        foreach (self::getTypes() as $type) {
            if ($type['id'] === $typeId) {
                return $type['name'];
            }
        }
        return null;
    }

    public function insurancePolicyData()
    {
        return $this->belongsTo(InsurancePolicyData::class);
    }
}
