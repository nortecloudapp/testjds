<?php

namespace App\Http\Livewire;

use App\Programa;
use Livewire\Component;
use Livewire\WithPagination;

class LivePrograma extends Component
{
    use WithPagination;
    public $searchInput;
    public $mensaje;
    private $pagination = 10;

    public function updatingSearchInput(): void
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $programas = Programa::where('nombre_programa', 'like', '%' . trim($this->searchInput) . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-programa', compact('programas'));
    }

    public function delete($id)
    {
        Programa::destroy($id);
    }
}
