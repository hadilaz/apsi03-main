<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validasi extends Model
{
    use HasFactory;
    protected $table = 'validasis';
    protected $fillable = ['user_id','proposal','laporan','seminar'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
