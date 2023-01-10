<?php

namespace App\Http\Livewire;

use App\Models\Jawaban;
use App\Models\Soal;
use App\Models\Ujian;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class EditSoal extends Component
{
    use WithPagination;

    public $idUjian;
    public $idSoals;
    public $totalSoal;
    public $jawabanTerpilih = [];

    public function mount($id)
    {
        $this->idUjian = $id;
    }

    public function soal(){
        $ujian = Ujian::findOrFail($this->idUjian);
        $soalUjian = $ujian['soals'];
        $idSoal = Soal::where('id_ujian', $this->idUjian)->select('id')->get();
        $jumlahSoal = $ujian['jml_pg']+$ujian['jml_essay'];

        $this->totalSoal = $soalUjian->count();

        if($this->totalSoal >= $jumlahSoal){
            $soal = $ujian->soals()->take($ujian->jumlah_soal)->paginate(1);
        } else if($this->totalSoal < $jumlahSoal) {
            $soal = $ujian->soals()->take($this->totalSoal)->paginate(1);
        }

        return $soal;
    }

    public function answer($idSoals, $answer){
        $this->jawabanTerpilih[$idSoals] = $idSoals.'-'.$answer;
    }

    public function saveJawaban(){
        $ujian = Ujian::findOrFail($this->idUjian);
        $soalUjian = $ujian['soals'];

        if(!empty($this->jawabanTerpilih)){
                foreach($this->jawabanTerpilih as $jawabs){
                    $jawabans = explode('-', $jawabs);
                    $jawab = Jawaban::updateOrCreate([
                        'id_user' => Auth()->id(),
                        'id_soal' => array_shift($jawabans),
                        'id_pilihan' => array_shift($jawabans)
                    ]);
                }
        }
        Alert::success('Selesai', 'Selamat Anda Telah Menyelesaikan Ujian Ini!');
        return redirect(route('ujians.index'));
    }

    public function render()
    {
        $this->dispatchBrowserEvent('soal');
        return view('livewire.edit-soal', [
            'ujian'     =>  Ujian::findOrFail($this->idUjian),
            'soal'      =>  $this->soal(),
        ]);
    }
}
