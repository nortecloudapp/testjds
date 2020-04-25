<?php

namespace App\Http\Livewire;

use App\Ncurso;
use Livewire\Component;
use Livewire\WithPagination;

class LiveNcurso extends Component
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
        $ncursos = Ncurso::where('nombre_curso', 'like', '%' . trim($this->searchInput) . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-ncurso', compact('ncursos'));
    }

    public function delete($id)
    {
        Ncurso::destroy($id);
    }
}
