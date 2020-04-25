<?php

namespace App\Http\Livewire;

use App\Material;
use Livewire\Component;
use Livewire\WithPagination;

class LiveMaterial extends Component
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
        $materiales = Material::with('ncurso')
            ->where('tag', 'like', '%' . trim($this->searchInput) . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->pagination);
        // $materiales = Material::join('ncursos', 'ncursos.id', '=', 'materials.ncurso_id')
        //     ->select('materials.*', 'nombre_curso')
        //     ->orWhere('tag', 'like', '%' . trim($this->searchInput) . '%')
        //     ->orWhere('nombre_curso', 'like', '%' . trim($this->searchInput) . '%')
        //     ->orderBy('materials.id', 'DESC')
        //     ->paginate($this->pagination);
        return view('livewire.live-material', compact('materiales'));
    }

    public function delete($id)
    {
        Material::destroy($id);
    }
}
