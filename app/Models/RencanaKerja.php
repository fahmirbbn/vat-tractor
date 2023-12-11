<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RencanaKerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rencana_kerja';

    protected $fillable = [
        'location_code',
        'mst_unit_id',
        'unit_name',
        'implement_id',
        'implement_name',
        'mst_activity_id',
        'activity_name',
        'activity_date',
        'operator_name',
        'created_by',
        'updated_by',
    ];

    public function unit()
    {
        return $this->belongsTo(MasterUnit::class, 'mst_unit_id');
    }

    public function implement()
    {
        return $this->belongsTo(MasterImplement::class, 'implement_id');
    }

    public function activity()
    {
        return $this->belongsTo(MasterActivity::class, 'mst_activity_id');
    }

    public function mstLocation()
    {
        return $this->belongsTo(MasterLocation::class, 'location_code');
    }
}
