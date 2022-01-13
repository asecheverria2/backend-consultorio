<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_con';
    public $timestamps = false;

    static $rules = [
		'cod_centros' => 'required',
		'cod_emp' => 'required',
        'cod_esp' => 'required',
        'fecha_con' => 'required',
        'hora_con' => 'required',
        'paciente_con' => 'required',
    ];
    protected $perPage = 20;

    protected $fillable = ['cod_centros','cod_emp','cod_esp','fecha_con','hora_con','paciente_con'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function especialidad()
    {
        return $this->hasOne('App\Models\Especialidad', 'cod_esp', 'cod_esp');
    }
}
