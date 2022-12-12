<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProgramStudi
 * @package App\Models
 * @version December 9, 2022, 7:17 am UTC
 *
 * @property \App\Models\Fakulta $idFakultas
 * @property integer $id_fakultas
 * @property string $kode
 * @property string $nama
 */
class ProgramStudi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'prodi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_fakultas',
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
        'id_fakultas' => 'integer',
        'kode' => 'string',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_fakultas' => 'nullable|integer',
        'kode' => 'nullable|string|max:15',
        'nama' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fakultas()
    {
        return $this->belongsTo(\App\Models\Fakultas::class, 'id_fakultas');
    }
}
