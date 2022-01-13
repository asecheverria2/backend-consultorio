<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_med';
    public $timestamps = false;
    static $rules = [
		'cod_emp' => 'required',
        'func_med' => 'required',
        'exp_med' => 'required',
    ];
    protected $perPage = 20;

    protected $fillable = ['cod_emp','func_med','exp_med'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'cod_emp', 'cod_emp');
    }
}
