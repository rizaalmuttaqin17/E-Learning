<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Soal
 * @package App\Models
 * @version December 12, 2022, 12:00 am UTC
 *
 * @property \App\Models\TipeSoal $idTipeSoal
 * @property \App\Models\Ujian $idUjian
 * @property \Illuminate\Database\Eloquent\Collection $jawabans
 * @property \Illuminate\Database\Eloquent\Collection $pilihans
 * @property integer $id_ujian
 * @property integer $id_tipe_soal
 * @property string $pertanyaan
 * @property integer $nilai
 */
class Soal extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'soal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_ujian',
        'id_tipe_soal',
        'pertanyaan',
        'nilai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_ujian' => 'integer',
        'id_tipe_soal' => 'integer',
        'pertanyaan' => 'string',
        'nilai' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_ujian' => 'nullable',
        'id_tipe_soal' => 'nullable|integer',
        'pertanyaan' => 'nullable|string',
        'nilai' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipeSoal()
    {
        return $this->belongsTo(\App\Models\TipeSoal::class, 'id_tipe_soal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ujian()
    {
        return $this->belongsTo(\App\Models\Ujian::class, 'id_ujian');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function jawaban()
    {
        return $this->hasMany(\App\Models\Jawaban::class, 'id_soal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pilihan()
    {
        return $this->hasMany(\App\Models\Pilihan::class, 'id_soal');
    }
}
