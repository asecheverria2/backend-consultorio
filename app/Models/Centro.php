<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pasajero
 *
 * @property $nombre_centro
 * @property $dir_centro
 * @property $tel_centro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Centro extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_centros';
    public $timestamps = false;
    static $rules = [
		'nombre_centros' => 'required',
		'dir_centros' => 'required',
        'tel_centros' => 'required',

    ];

    protected $perPage = 20;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_centro','dir_centro','tel_centro'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consulta()
    {
        return $this->hasMany('App\Models\Consulta', 'cod_centros', 'cod_centros');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleado()
    {
        return $this->hasMany('App\Models\Empleado', 'cod_centros', 'cod_centros');
    }
}
