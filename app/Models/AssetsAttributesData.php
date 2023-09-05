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

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}

