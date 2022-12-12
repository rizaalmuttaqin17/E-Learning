<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kategori
 * @package App\Models
 * @version December 11, 2022, 11:58 pm UTC
 *
 * @property string $nama
 * @property string $slug
 * @property string $deskripsi
 * @property string $photos
 * @property boolean $is_active
 */
class Kategori extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kategori';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'photos',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'slug' => 'string',
        'deskripsi' => 'string',
        'photos' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'nullable|string|max:45',
        'slug' => 'nullable|string|max:45',
        'deskripsi' => 'nullable|string|max:45',
        'photos' => 'nullable|string|max:145',
        'is_active' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
