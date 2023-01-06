<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jawaban;
use App\Models\Soal;

class Ujian extends Component
{
    use WithPagination;
    public $idUjian;

    public function mount($id)
    {
        $this->idUjian = $id;
        
    }

    public function render()
    {
        $ujian = Ujian::findOrFail($this->idUjian);
        return view('livewire.ujian', [
            'ujian'     =>  Ujian::findOrFail($this->idUjian)
        ]);
    }
}
