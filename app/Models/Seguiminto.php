<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Seguiminto
 * @package App\Models
 * @version March 4, 2023, 4:12 pm -03
 *
 * @property string $descripcion
 * @property string $fecha
 */
class Seguiminto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'seguimintos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'descripcion',
        'fecha',
        'id_expediente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'fecha' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required',
        'fecha' => 'required'
    ];

    
}
