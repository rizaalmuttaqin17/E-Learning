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
    public $jawaban = [];
    public $benar;
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
                $soal = $ujian->soals()->take($ujian->jumlah_soal)->inRandomOrder(1)->paginate(1);
            } else if($this->totalSoal < $jumlahSoal) {
                $soal = $ujian->soals()->take($this->totalSoal)->inRandomOrder(1)->paginate(1);
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
                $soalUjian = Soal::where('id', $jawabans[0])->first();
                if($soalUjian['id_tipe_soal'] == 1){
                    $pilihan = Pilihan::where('id', $jawabans[1])->first();
                    if($pilihan['benar'] == "true"){
                        $this->benar = 100/$ujian['jml_pg'];
                    } else {
                        $this->benar = 0;
                    }
                    $jawab = Jawaban::updateOrCreate([
                        'id_user' => Auth()->id(),
                        'id_soal' => $jawabans[0],
                        'id_pilihan' => $jawabans[1],
                        'nilai' => $this->benar
                    ]);
                } else {
                    $jawab = Jawaban::updateOrCreate([
                        'id_user' => Auth()->id(),
                        'id_soal' => $jawabans[0],
                        'jawaban' => $jawabans[1],
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
