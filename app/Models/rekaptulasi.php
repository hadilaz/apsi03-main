<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekaptulasi extends Model
{
    use HasFactory;
    protected $table ='rekapitulasis';
    protected $fillable = ['nama','dokumen','dokumen_g','dokumen_g'];
}
