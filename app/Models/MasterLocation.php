<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterLocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_locations';

    protected $fillable = [
        'location_code',
        'location_name',
        'luas_bruto',
        'luas_netto',
        'geofence',
        'created_by',
        'updated_by',
    ];

    public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'location_code');
    }
}
