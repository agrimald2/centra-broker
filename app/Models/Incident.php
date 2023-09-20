<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'asset_id',
        'incident_number',
        'case_number',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function incidentHistories()
    {
        return $this->hasMany(IncidentHistory::class);
    }

    public function lastIncidentHistory()
    {
        return $this->hasOne(IncidentHistory::class)->latest();
    }
}