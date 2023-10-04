<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetsType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];
    
    public function attributes()
    {
        return $this->hasMany(AssetsTypesAttribute::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}

