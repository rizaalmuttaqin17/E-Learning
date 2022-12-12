<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Jawaban
 * @package App\Models
 * @version December 12, 2022, 12:07 am UTC
 *
 * @property \App\Models\Soal $idSoal
 * @property \App\Models\User $idUser
 * @property integer $id_soal
 * @property integer $id_user
 * @property string $jawaban
 * @property string $jawaban_benar
 * @property integer $nilai_jawaban
 */
class Jawaban extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jawaban';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_soal',
        'id_user',
        'jawaban',
        'jawaban_benar',
        'nilai_jawaban'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_soal' => 'integer',
        'id_user' => 'integer',
        'jawaban' => 'string',
        'jawaban_benar' => 'string',
        'nilai_jawaban' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_soal' => 'nullable',
        'id_user' => 'nullable',
        'jawaban' => 'nullable|string|max:145',
        'jawaban_benar' => 'nullable|string|max:145',
        'nilai_jawaban' => 'nullable|integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idUser()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user');
    }
}
