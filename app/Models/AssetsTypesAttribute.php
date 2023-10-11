<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AssetsType;

class AssetsTypesAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'assets_type_id',
        'input_type',
        'name',
        'description',
        'example'
    ];

    public function assetsType()
    {
        return $this->belongsTo(AssetsType::class);
    }

    public function assetsAttributesData(){
        return $this->hasMany(AssetsAttributesData::class, 'assets_types_attributes_id', 'id');
    }
}

