<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaNilai extends Model
{
    use HasFactory;
    protected $table = 'skala_nilai';
    protected $guarded = ['id'];
}
