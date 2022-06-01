<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revisi extends Model
{
    use HasFactory;
    protected $table ='revisis';
    protected $fillable = ['user_id','dokumen'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
