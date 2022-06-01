<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }

    public function rekaptulasi()
    {
        return $this->hasOne(rekaptulasi::class);
    }
    
    public function validasi()
    {
        return $this->hasOne(Validasi::class);
    }
    
    public function revisi()
    {
        return $this->hasOne(revisi::class);
    }
}
