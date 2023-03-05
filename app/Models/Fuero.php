<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Fuero
 * @package App\Models
 * @version March 4, 2023, 3:52 pm -03
 *
 * @property string $nombre_fuero
 * @property string $descripcion_fuero
 */
class Fuero extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'fueros';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre_fuero',
        'descripcion_fuero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_fuero' => 'string',
        'descripcion_fuero' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_fuero' => 'required',
        'descripcion_fuero' => 'required'
    ];

    
}
