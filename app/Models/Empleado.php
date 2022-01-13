<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_emp';
    public $timestamps = false;
    static $rules = [
		'nombre_emp' => 'required',
        'dir_emp' => 'required',
        'salario_emp' => 'required',
        'fecha_ent_emp' => 'required',
        'cod_centros' => 'required',
    ];
    protected $perPage = 20;

    protected $fillable = ['nombre_emp','dir_emp','salario_emp','fecha_ent_emp','cod_centros'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medico()
    {
        return $this->hasOne('App\Models\Medico', 'cod_emp', 'cod_emp');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function centro()
    {
        return $this->hasOne('App\Models\Centro', 'cod_centros', 'cod_centros');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consulta()
    {
        return $this->hasMany('App\Models\Consulta', 'cod_emp', 'cod_emp');
    }
}
