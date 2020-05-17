<?php

namespace App\Models;

use App\Traits\TimestampsTrait;
use App\Traits\TareasTrait;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{

    use TimestampsTrait;
    use TareasTrait;

    public function getDates() {
		return ['created_at', 'updated_at', 'fecha_vencimiento'];
	}

    //Definición de la tabla 'Tareas'
    protected $table = 'tareas';
    
}
