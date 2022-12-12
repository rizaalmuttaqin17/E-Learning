<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MataKuliah
 * @package App\Models
 * @version December 12, 2022, 7:17 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $ujians
 * @property string $kode_mk
 * @property string $nama
 * @property string $dosen_pengampu
 */
class MataKuliah extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mata_kuliah';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_mk',
        'nama',
        'dosen_pengampu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_mk' => 'string',
        'nama' => 'string',
        'dosen_pengampu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_mk' => 'nullable|string|max:15',
        'nama' => 'nullable|string|max:45',
        'dosen_pengampu' => 'nullable|string|max:145',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ujians()
    {
        return $this->hasMany(\App\Models\Ujian::class, 'id_mata_kuliah');
    }
}
