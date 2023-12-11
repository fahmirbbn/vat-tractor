<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterImplement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_implements';

    protected $fillable = [
        'implement_code',
        'implement_name',
        'created_by',
        'updated_by',
    ];

    public function rencanaKerja()
    {
        return $this->hasMany(RencanaKerja::class, 'implement_id');
    }
}
