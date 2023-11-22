<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganKriteria extends Model
{
    use HasFactory;
    protected $table = 'perbandingan_kriteria';
    protected $guarded = ['id'];
}
