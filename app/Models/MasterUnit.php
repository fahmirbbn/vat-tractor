<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterUnit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_units';

    protected $fillable = [
        'unit_code',
        'unit_name',
        'pg_id',
        'created_by',
        'updated_by',
    ];

    public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'mst_unit_id');
    }
}
