<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['ncurso_id', 'user_id'];

    public function ncurso()
    {
        return $this->belongsTo(Ncurso::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
