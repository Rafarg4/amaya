<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Expediente
 * @package App\Models
 * @version September 23, 2022, 3:29 am UTC
 *
 * @property string $numero
 * @property string $anho
 * @property string $caratula
 * @property integer $id_circunscripcion
 * @property integer $id_juzgado
 */
class Expediente extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'expedientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'numero',
        'anho',
        'caratula',
        'id_circunscripcion',
        'id_juzgado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numero' => 'string',
        'anho' => 'string',
        'caratula' => 'string',
        'id_circunscripcion' => 'integer',
        'id_juzgado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numero' => 'required',
        'anho' => 'required',
        'caratula' => 'required',
        'id_circunscripcion' => 'required',
        'id_juzgado' => 'required'
    ];

    
}