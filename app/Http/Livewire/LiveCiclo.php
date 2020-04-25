<?php

namespace App\Http\Livewire;

use App\Ciclo;
use Livewire\Component;
use Livewire\WithPagination;

class LiveCiclo extends Component
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
        $ciclos = Ciclo::where('nro_ciclo', 'like', '%' . trim($this->searchInput) . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-ciclo', compact('ciclos'));
    }

    public function delete($id)
    {
        Ciclo::destroy($id);
    }
}
