<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganSubKriteria extends Model
{
    use HasFactory;
    protected $table = 'perbandingan_sub_kriteria';
    protected $guarded = ['id'];
}
