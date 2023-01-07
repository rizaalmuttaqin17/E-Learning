<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jawaban;
use App\Models\Pilihan;
use App\Models\Soal;
use App\Models\Ujian as Ujians;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class Ujian extends Component
{
    use WithPagination;

    public $idUjian;
    public $idSoals;
    public $totalSoal;
    public $jawabanTerpilih = [];
    protected $listeners = ['endTimer' => 'saveJawaban'];

    public function mount($id)
    {
        $this->idUjian = $id;
    }

    public function soal(){
        $ujian = Ujians::findOrFail($this->idUjian);
        $soalUjian = $ujian['soals'];
        $idSoal = Soal::where('id_ujian', $this->idUjian)->select('id')->get();
        $jawaban = Jawaban::select('id_soal')->where('id_user', Auth()->id())->whereIn('id_soal', $idSoal)->first();

        $this->totalSoal = $soalUjian->count();

        if($this->totalSoal >= $ujian['jumlah_soal']){
            $soal = $ujian->soals()->take($ujian->jumlah_soal)->paginate(1);
        } else if($this->totalSoal < $ujian['jumlah_soal']) {
            $soal = $ujian->soals()->take($this->totalSoal)->paginate(1);
        }
        return $soal;
    }

    public function answer($idSoals, $answer){
        $this->jawabanTerpilih[$idSoals] = $idSoals.'-'.$answer;
    }

    public function saveJawaban(){
        $ujian = Ujians::findOrFail($this->idUjian);
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
        return view('livewire.ujian', [
            'ujian'     =>  Ujians::findOrFail($this->idUjian),
            'soal'      =>  $this->soal(),
        ]);
    }
}
