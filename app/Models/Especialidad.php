<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_esp';
    public $timestamps = false;

    static $rules = [
		'nombre_esp' => 'required',
		'descrip_esp' => 'required',

    ];

    protected $perPage = 20;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_esp','descrip_esp'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consulta()
    {
        return $this->hasMany('App\Models\Consulta', 'cod_esp', 'cod_esp');
    }
}
