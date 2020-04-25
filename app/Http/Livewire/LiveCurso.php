<?php

namespace App\Http\Livewire;

use App\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class LiveCurso extends Component
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
        $cursos = Curso::where('ncurso_id', 'like', '%' . trim($this->searchInput) . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-curso', compact('cursos'));
    }

    public function delete($id)
    {
        Curso::destroy($id);
    }
}
