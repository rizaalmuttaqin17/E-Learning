<?php

namespace App\Http\Controllers;

use App\DataTables\JawabanDataTable;
use App\DataTables\SoalDataTable;
use App\DataTables\UjianDataTable;
use App\DataTables\UserJawabanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUjianRequest;
use App\Http\Requests\UpdateUjianRequest;
use App\Repositories\UjianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Jawaban;
use App\Models\MataKuliah;
use App\Models\Pilihan;
use App\Models\ProgramStudi;
use App\Models\Soal;
use App\Models\TipeSoal;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Response;
use Image;

class UjianController extends AppBaseController
{
    /** @var  UjianRepository */
    private $ujianRepository;

    public function __construct(UjianRepository $ujianRepo)
    {
        $this->ujianRepository = $ujianRepo;
    }

    /**
     * Display a listing of the Ujian.
     *
     * @param UjianDataTable $ujianDataTable
     * @return Response
     */
    public function index(UjianDataTable $ujianDataTable)
    {
        return $ujianDataTable->render('ujians.index');
    }

    /**
     * Show the form for creating a new Ujian.
     *
     * @return Response
     */
    public function create()
    {
        $matkul = MataKuliah::pluck('nama', 'id');
        $prodi = ProgramStudi::pluck('nama', 'id');
        return view('ujians.create', compact('matkul', 'prodi'));
    }

    /**
     * Store a newly created Ujian in storage.
     *
     * @param CreateUjianRequest $request
     *
     * @return Response
     */
    public function store(CreateUjianRequest $request)
    {
        $input = $request->all();
        $input['id_user'] = Auth::id();
        $input['kode'] = substr(str_shuffle(md5(time())),0, 5);

        if(is_numeric($input['id_mata_kuliah']) == true){
            $request['id_mata_kuliah'] = $input['id_mata_kuliah'];
        } else {
            $matkul = new MataKuliah;
            $matkul['nama'] = $input['id_mata_kuliah'];
            $matkul->save();
            $matkuls = MataKuliah::select('id', 'nama')->where('nama', $input['id_mata_kuliah'])->first();
            $input['id_mata_kuliah'] = $matkuls['id'];
        }
        // return $request;
        $ujian = $this->ujianRepository->create($input);
        Flash::success(__('messages.saved', ['model' => __('models/ujians.singular')]));
        return redirect(route('ujians.index'));
    }

    /**
     * Display the specified Ujian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ujian = $this->ujianRepository->find($id);
        $soal = Soal::where('id_ujian', $id)->first();
        $prodi = ProgramStudi::pluck('nama', 'id');

        $idSoal = Soal::where('id_ujian', $id)->select('id')->get();
        $soalPG = Soal::where('id_ujian', $id)->where('id_tipe_soal', 1)->select('id')->get();
        $soalEssay = Soal::where('id_ujian', $id)->where('id_tipe_soal', 2)->select('id')->get();
        $jawaban = Jawaban::select('id_soal')->where('id_user', Auth::id())->whereIn('id_soal', $idSoal)->get();
        $jawabans = Jawaban::where('id_user', Auth::id())->whereIn('id_soal', $idSoal)->get();
        $jawabanPG = Jawaban::where('id_user', Auth::id())->whereIn('id_soal', $soalPG)->get();
        $jawabanEssay = Jawaban::where('id_user', Auth::id())->whereIn('id_soal', $soalEssay)->get();

        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return view('ujians.show', compact('soal', 'prodi', 'jawaban', 'jawabans', 'jawabanPG', 'jawabanEssay'))->with('ujian', $ujian);
    }

    /**
     * Show the form for editing the specified Ujian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ujian = $this->ujianRepository->find($id);
        $matkul = MataKuliah::pluck('nama', 'id');
        $soal = Soal::where('id_ujian', $id)->get();
        $prodi = ProgramStudi::pluck('nama', 'id');

        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return view('ujians.edit', compact('matkul', 'soal', 'prodi'))->with('ujian', $ujian);
    }

    /**
     * Update the specified Ujian in storage.
     *
     * @param  int              $id
     * @param UpdateUjianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUjianRequest $request)
    {
        $ujian = $this->ujianRepository->find($id);

        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }

        if(is_numeric($request['id_mata_kuliah']) == true){
            $request['id_mata_kuliah'] = $request['id_mata_kuliah'];
        } else {
            $matkul = new MataKuliah;
            $matkul['nama'] = $request['id_mata_kuliah'];
            $matkul->save();
            $matkuls = MataKuliah::select('id', 'nama')->where('nama', $request['id_mata_kuliah'])->first();
            $request['id_mata_kuliah'] = $matkuls['id'];
        }

        $ujian = $this->ujianRepository->update($request->all(), $id);
        Flash::success(__('messages.updated', ['model' => __('models/ujians.singular')]));
        return redirect(route('ujians.index'));
    }

    /**
     * Remove the specified Ujian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ujian = $this->ujianRepository->find($id);
        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }

        $this->ujianRepository->delete($id);
        Alert::success('Sukses', 'Data '.$ujian['matkul']['nama'].' Telah Berhasil di Hapus');
        // Flash::success(__('messages.deleted', ['model' => __('models/ujians.singular')]));
        return redirect(route('ujians.index'));
    }
    
    public function changeStatus($id, UpdateUjianRequest $request){
        $ujian = $this->ujianRepository->find($id);
        // return $request['status'];
        $ujian = $this->ujianRepository->update($request->all(), $id);
        
        return redirect(route('ujians.index'));
    }

    public function createSoal($id){
        $ujian = $this->ujianRepository->find($id);
        $soalPG = Soal::select('id')->where('id_ujian', $id)->where('id_tipe_soal', 1)->get();
        $soalEssay = Soal::select('id')->where('id_ujian', $id)->where('id_tipe_soal', 2)->get();
        $matkul = MataKuliah::pluck('nama', 'id');

        $soal = Soal::where('id_ujian', $id)->first();
        $soalTotal = $soalPG->count() + $soalEssay->count();
        $soalUjian = $ujian['jml_pg'] + $ujian['jml_essay'];
        if($soalTotal == $soalUjian){
            Alert::warning('Jumlah soal terpenuhi!','Apakah anda yakin ingin menambah soal?')
            ->showConfirmButton('Ya', '')
            ->showCancelButton('<a href="'.route('ujians.index').'" style="text-decoration:none; color:white">Tidak</a>', '#aaaaaa');
            return view('ujians.soal.createSoal', compact('matkul', 'soal', 'ujian', 'soalPG', 'soalEssay'));
        } else {
            return view('ujians.soal.createSoal', compact('matkul', 'soal', 'ujian', 'soalPG', 'soalEssay'));
        }
    }

    public function saveSoal($id, Request $request)
    {
        $input = $request->all();
        $content = $request['pertanyaan'];
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $imageSrc = $image->getAttribute('src');
            if (preg_match('/data:image/', $imageSrc)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $imageSrc, $mime);
                $mimeType = $mime['mime'];
                $filename = uniqid();
                $filePath = "uploads/$filename.$mimeType";
                Image::make($imageSrc)
                    ->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode($mimeType, 100)
                    ->save(public_path($filePath));
                $newImageSrc = asset($filePath);
                $image->removeAttribute('src');
                $image->setAttribute('src', $newImageSrc);
            }
        }
        $content = $dom->saveHTML();
        if($request['id_tipe_soal'] == 1){
            $soal = new Soal;
            $soal['id_ujian'] = $id;
            $soal['id_tipe_soal'] = $request['id_tipe_soal'];
            $soal['pertanyaan'] = $request['pertanyaan'];
            $soal->save();
            for($i=0; $i<COUNT($request['pilihan']); $i++){
                $pilihan = new Pilihan;
                $soals = Soal::orderBy('id', 'desc')->first();
                $pilihan['id_soal'] = $soals['id'];
                $pilihan['pilihan'] = $request['pilihan'][$i];
                if(array_key_exists($i, $request['benar']) == true) {
                    $pilihan['benar'] = "true";
                } else {
                    $pilihan['benar'] = "false";
                }
                $pilihan->save();
            }
            toast('Soal Tersimpan!','success');
            return redirect(route('ujians.createSoal', $id));
        } else {
            $soal = Soal::create($input);
            toast('Soal Tersimpan!','success');
            return redirect(route('ujians.createSoal', $id));
        }
    }

    public function ujiansMahasiswa($id, Request $request){
        $ujian = $this->ujianRepository->find($id);
        $durasi = $ujian['durasi'];
        $soalsId = Soal::where('id_ujian', $id)->select('id')->get();
        $jawabanTotal = Jawaban::where('id_user', Auth::id())->whereIn('id_soal', $soalsId)->get();
        $jawabansoal = Jawaban::select('id_soal')->where('id_user', Auth::id())->whereIn('id_soal', $soalsId)->get();
        $jumlahSoal = $ujian['jml_pg']+$ujian['jml_essay'];
        if(count($jawabanTotal) == $jumlahSoal){
            Alert::success('Selesai', 'Selamat Anda Telah Menyelesaikan Ujian Ini!');
            return redirect(route('ujians.index'));
        } else {
            // $soal = Soal::whereNotIn('id', $jawabansoal)->where('id_ujian', $id)->paginate(1);
            $soal = Soal::where('id_ujian', $id)->paginate()->random();
            $jawaban = Jawaban::select('id_soal')->where('id_user', Auth::id())->whereIn('id_soal', $soalsId)->first();
        }
        
        $matkul = MataKuliah::pluck('nama', 'id');
        return view('ujians.mhs_ujian', compact('matkul', 'ujian', 'soal', 'durasi', 'jawaban', 'id'));
    }

    public function kodeUjian($id, Request $request){
        $ujian = Ujian::where('id', $id)->first();
        $idSoal = Soal::where('id_ujian', $id)->select('id')->get();
        $jawaban = Jawaban::select('id_soal')->where('id_user', Auth::id())->whereIn('id_soal', $idSoal)->first();
        if($jawaban == null){
            if($ujian['kode'] == $request['kode_ujian']){
                return redirect(route('ujians.mahasiswa-ujian', $id));
            } else {
                Alert::error('Gagal', 'Kode Ujian Yang Anda Masukkan Salah');
                return redirect()->back();
            }
        } else {
            Alert::warning('Peringatan', 'Anda telah mengikuti ujian ini!');
            return redirect()->back();
        }
    }

    public function editSoal($id, SoalDataTable $soalDataTable)
    {
        $ujian = $this->ujianRepository->find($id);
        $soal = Soal::where('id_ujian', $id)->get();
        $matkul = MataKuliah::pluck('nama', 'id');
        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return $soalDataTable->with('id', $id)->render('ujians.edit_soal', compact('soal', 'ujian', 'matkul', 'id'));
    }

    public function soalEdit($id){
        $soal = Soal::find($id);
        if (empty($soal)) {
            Alert::error('Error', 'Data Tidak Ditemukan');
            return redirect()->back();
        }
        $ujian = Ujian::with('matkul')->get()->pluck('matkul.nama', 'id');
        $tipeSoal = TipeSoal::pluck('nama', 'id');

        return view('soals.edit', compact('ujian', 'tipeSoal'))->with('soal', $soal);
    }

    public function updateSoal($id, Request $request){
        $input = $request->all();
        $content = $request['pertanyaan'];
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $imageSrc = $image->getAttribute('src');
            if (preg_match('/data:image/', $imageSrc)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $imageSrc, $mime);
                $mimeType = $mime['mime'];
                $filename = uniqid();
                $filePath = "uploads/$filename.$mimeType";
                Image::make($imageSrc)
                    ->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode($mimeType, 100)
                    ->save(public_path($filePath));
                $newImageSrc = asset($filePath);
                $image->removeAttribute('src');
                $image->setAttribute('src', $newImageSrc);
            }
        }
        $content = $dom->saveHTML();
        if($request['id_tipe_soal'] == 1){
            $soal = Soal::findOrFail($id)->update([
                'id_ujian' => $request['id_ujian'],
                'id_tipe_soal' => $request['id_tipe_soal'],
                'pertanyaan' => $request['pertanyaan'],
                'penjelasan' => $request['penjelasan'],
            ]);
            for($i=0; $i<COUNT($request['pilihan']); $i++){
                if($request['pilihan'] != null){
                    $pilihan = Pilihan::find($request['pilihanId'][$i]);
                    if(array_key_exists($i, $request['benar']) == true) {
                        $pilihan['benar'] = "true";
                    } else {
                        $pilihan['benar'] = "false";
                    }
                    $pilihan->update([
                        'id_soal' => $id, 
                        'pilihan' => $request['pilihan'][$i], 
                        'benar' => $pilihan['benar']
                    ]);
                }
            }
        } else {
            $soal = Soal::findOrFail($id)->update([
                'id_ujian' => $request['id_ujian'],
                'id_tipe_soal' => $request['id_tipe_soal'],
                'pertanyaan' => $request['pertanyaan'],
                'penjelasan' => $request['penjelasan'],
            ]);
        }
        Alert::success('Sukses', 'Soal Berhasil di Ubah');
        return redirect(route('ujians.edit-soal', $id));
    }

    public function showPeserta($id, UserJawabanDataTable $userJawabanDataTable)
    {
        $ujian = $this->ujianRepository->find($id);
        $soal = Soal::where('id_ujian', $id)->get();
        $soals = Soal::select('id')->where('id_ujian', $id)->get();
        $jawaban = Jawaban::select('id_user')->whereIn('id_soal', $soals)->get();
        $user = User::whereIn('id', $jawaban)->get();
        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return $userJawabanDataTable->with('id', $id)->render('ujians.show_peserta', compact('ujian', 'soal', 'user'));
    }

    public function showUjianPeserta($id, $idUjian, JawabanDataTable $jawabanDataTable)
    {
        $jawaban = Jawaban::select('id_soal')->where('id_user', $id)->get();
        $soal = Soal::where('id_ujian', $idUjian)->whereIn('id', $jawaban)->get();
        $ujian = Ujian::where('id', $idUjian)->first();
        // return $ujian;
        if($jawaban != null){
            return $jawabanDataTable->with(['id' => $id, 'idUjian' => $idUjian])->render('ujians.show_ujian_peserta', compact('ujian'));
        } else {
            Alert::warning('Warning', 'Belum ada peserta pada ujian ini!');
            return redirect()->back();
        }
    }

    public function nilaiSoal($id, Request $request, JawabanDataTable $jawabanDataTable)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->update([
            'nilai' => $request['nilai'], 
        ]);
        toast('Nilai Berhasil Tersimpan!','success');
        return redirect()->back();
    }
}