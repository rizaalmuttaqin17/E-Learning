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
        'tipe_ujian',
        'sifat_ujian',
        'tanggal_ujian',
        'percobaan',
        'jumlah_soal',
        'status',
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
        'tipe_ujian' => 'string',
        'sifat_ujian' => 'string',
        'percobaan' => 'integer',
        'jumlah_soal' => 'integer',
        'tanggal_ujian' => 'date',
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
        'tipe_ujian' => 'nullable|string',
        'sifat_ujian' => 'nullable|string|max:45',
        'tanggal_ujian' => 'nullable',
        'jumlah_soal' => 'nullable|integer',
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
}
