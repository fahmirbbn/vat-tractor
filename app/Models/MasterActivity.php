<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_activities';

    protected $fillable = [
        'activity_code',
        'activity_name',
        'created_by',
        'updated_by',
    ];

    public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'mst_activity_id');
    }
}
