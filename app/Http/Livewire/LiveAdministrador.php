<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class LiveAdministrador extends Component
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
        $administradores = User::whereHas(
            'roles',
            function ($q) {
                $q->where('nombre_rol', 'admin');
            }
        )->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-administrador', compact('administradores'));
    }
}
