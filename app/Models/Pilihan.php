<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pilihan
 * @package App\Models
 * @version December 12, 2022, 12:00 am UTC
 *
 * @property \App\Models\Soal $idSoal
 * @property integer $id_soal
 * @property string $pilihan
 * @property string $benar
 * @property integer $nilai
 */
class Pilihan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pilihan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_soal',
        'pilihan',
        'benar',
        'nilai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_soal' => 'integer',
        'pilihan' => 'string',
        'benar' => 'string',
        'nilai' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_soal' => 'nullable',
        'pilihan' => 'nullable|string|max:145',
        'benar' => 'nullable|string|max:145',
        'nilai' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idSoal()
    {
        return $this->belongsTo(\App\Models\Soal::class, 'id_soal');
    }
}
