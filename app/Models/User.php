<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'id_prodi',
        'email',
        'agama',
        'no_induk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'jenis_kelamin',
        'foto',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules=[
        'name'=>'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    /* public function beritas()
    {
        return $this->hasMany(\App\Models\Berita::class, 'id_user');
    } */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function jawaban()
    {
        return $this->hasMany(\App\Models\Jawaban::class, 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function prodi()
    {
        return $this->hasMany(\App\Models\ProgramStudi::class, 'id_prodi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ujians()
    {
        return $this->hasMany(\App\Models\Ujian::class, 'id_user');
    }
}
