<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RencanaKerja extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rencana_kerja';

//    protected $hidden = [
//       'created_at',
//       'updated_at',
//       'deleted_at',
//    ];
}
