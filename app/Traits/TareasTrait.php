<?php

namespace App\Traits;

use Carbon\Carbon;

trait TareasTrait {

    public $fechaVencimientoFormato = true;

    public function getFechaVencimientoAttribute($value) {
		if($this->fechaVencimientoFormato) {
			return Carbon::parse($value)->toFormattedDateString();
		} else {
			return $this->attributes['fecha_vencimiento'] = $value;
		}
	}	
}