<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncidentHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'incident_id',
        'incident_date',
        'driver_id',
        'place',
        'police_station',
        'status_id',
        'summary',
        'have_police_conclusion',
        'police_conclusion',
        'workshop_id',
        'workshop_entrance_date',
        'budget_approval_date',
        'executive_id',
        'is_bank_endorsed',
        'bank_id',
        'deductible',
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function executive()
    {
        return $this->belongsTo(Executive::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}