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
    public $jawaban;
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
        $jumlahSoal = $ujian['jml_pg']+$ujian['jml_essay'];

        if($jawaban == null){
            $this->totalSoal = $soalUjian->count();
            if($this->totalSoal >= $jumlahSoal){
                $soal = $ujian->soals()->take($ujian->jumlah_soal)->paginate(1);
            } else if($this->totalSoal < $jumlahSoal) {
                $soal = $ujian->soals()->take($this->totalSoal)->paginate(1);
            }
            return $soal;
        } else {
            Alert::warning('Peringatan', 'Anda sudah mengikuti ujian ini!');
            return redirect(url()->previous());
        }
    }

    public function answer($idSoals, $answer){
        $this->jawabanTerpilih[$idSoals] = $idSoals.'-'.$answer;
    }

    public function saveJawaban(){
        $ujian = Ujians::findOrFail($this->idUjian);
        
        if(!empty($this->jawabanTerpilih)){
            foreach($this->jawabanTerpilih as $jawabs){
                $jawabans = explode('-', $jawabs);
                $idSoal = explode($jawabs, '-');
                $soalUjian = Soal::where('id', $this->idSoals)->first();
                if($soalUjian['id_tipe_soal'] == 1){
                    $jawab = Jawaban::updateOrCreate([
                        'id_user' => Auth()->id(),
                        'id_soal' => array_shift($jawabans),
                        'id_pilihan' => array_shift($jawabans),
                        'nilai' => 100/$ujian['jml_pg']
                    ]);
                } else {
                    $jawab = Jawaban::updateOrCreate([
                        'id_user' => Auth()->id(),
                        'id_soal' => array_shift($idSoal),
                        'jawaban' => array_shift($jawabans),
                    ]);
                }
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
