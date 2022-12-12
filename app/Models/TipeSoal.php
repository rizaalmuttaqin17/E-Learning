<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TipeSoal
 * @package App\Models
 * @version December 11, 2022, 11:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $soals
 * @property string $nama
 */
class TipeSoal extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tipe_soal';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function soals()
    {
        return $this->hasMany(\App\Models\Soal::class, 'id_tipe_soal');
    }
}
