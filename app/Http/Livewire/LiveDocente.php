<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class LiveDocente extends Component
{
    use WithPagination;
    public $searchInput;
    private $pagination = 10;

    public function updatingSearchInput(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $docentes = User::whereHas(
            'roles',
            function ($q) {
                $q->where('nombre_rol', 'docente');
            }
        )->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-docente', compact('docentes'));
    }
}
