<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsAttributesData extends Model
{
    use HasFactory;

    protected $table = 'assets_attributes_data';

    protected $fillable = [
        'asset_id',
        'assets_types_attributes_id',
        'value',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function assetsTypesAttribute()
    {
        return $this->belongsTo(AssetsTypesAttribute::class, 'assets_types_attributes_id', 'id');
    }
}

