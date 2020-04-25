<?php

namespace App\Http\Livewire;

use App\Nota;
use Livewire\Component;
use Livewire\WithPagination;

class LiveNota extends Component
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
        $notas = Nota::where('nro_nota', 'like', '%' . trim($this->searchInput) . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        return view('livewire.live-nota', compact('notas'));
    }

    public function delete($id)
    {
        Nota::destroy($id);
    }
}
