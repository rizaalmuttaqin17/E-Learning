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
 * @property integer $id_pilihan
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
        'id_pilihan',
        'id_user',
        'jawaban',
        'nilai_jwb'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_pilihan' => 'integer',
        'id_user' => 'integer',
        'jawaban' => 'string',
        'nilai_jwb' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_pilihan' => 'nullable',
        'id_user' => 'nullable',
        'jawaban' => 'nullable|string|max:145',
        'nilai_jwb' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pilihan()
    {
        return $this->belongsTo(\App\Models\Pilihan::class, 'id_pilihan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user');
    }
}
