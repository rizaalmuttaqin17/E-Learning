<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Fakultas
 * @package App\Models
 * @version December 9, 2022, 6:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $prodis
 * @property string $kode
 * @property string $nama
 */
class Fakultas extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'fakultas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode' => 'string',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'nullable|string|max:15',
        'nama' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function prodis()
    {
        return $this->hasMany(\App\Models\Prodi::class, 'id_fakultas');
    }
}
