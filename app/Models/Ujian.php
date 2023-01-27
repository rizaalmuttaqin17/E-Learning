<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ujian
 * @package App\Models
 * @version December 12, 2022, 12:01 am UTC
 *
 * @property \App\Models\MataKuliah $idMataKuliah
 * @property \Illuminate\Database\Eloquent\Collection $soals
 * @property integer $id_mata_kuliah
 * @property string $tipe_ujian
 * @property string $sifat_ujian
 * @property string $tanggal_ujian
 * @property string $selesai
 */
class Ujian extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ujian';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id_mata_kuliah',
        'id_user',
        'id_prodi',
        'kode',
        'nama',
        'start',
        'end',
        'jml_pg',
        'jml_essay',
        'status',
        'percobaan',
        'nilai',
        'durasi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_mata_kuliah' => 'integer',
        'id_user' => 'integer',
        'id_prodi' => 'integer',
        'kode' => 'string',
        'nama' => 'string',
        'percobaan' => 'string',
        'jml_pg' => 'integer',
        'jml_essay' => 'integer',
        'status' => 'integer',
        'nilai' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_mata_kuliah' => 'nullable',
        'id_user' => 'nullable',
        'id_prodi' => 'nullable',
        'kode' => 'nullable|string',
        'nama' => 'nullable|string|max:45',
        'jml_pg' => 'nullable|integer',
        'jml_essay' => 'nullable|integer',
        'percobaan' => 'nullable|string',
        'status' => 'nullable|integer',
        'nilai' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function matkul()
    {
        return $this->belongsTo(\App\Models\MataKuliah::class, 'id_mata_kuliah');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function soals()
    {
        return $this->hasMany(\App\Models\Soal::class, 'id_ujian');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function prodi()
    {
        return $this->hasMany(\App\Models\ProgramStudi::class, 'id_prodi');
    }
}
