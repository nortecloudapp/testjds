<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['ncurso_id', 'tag', 'url'];

    public function ncurso()
    {
        return $this->belongsTo(Ncurso::class);
    }
}
