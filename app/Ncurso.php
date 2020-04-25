<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncurso extends Model
{
    protected $fillable = ['nombre_curso', 'ciclo_id', 'programa_id'];

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class);
    }
}
