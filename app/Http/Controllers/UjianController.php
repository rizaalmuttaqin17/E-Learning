<?php

namespace App\Http\Controllers;

use App\DataTables\SoalDataTable;
use App\DataTables\UjianDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUjianRequest;
use App\Http\Requests\UpdateUjianRequest;
use App\Repositories\UjianRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Jawaban;
use App\Models\MataKuliah;
use App\Models\Pilihan;
use App\Models\Soal;
use App\Models\TipeSoal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Response;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('ujians.create', compact('matkul'));
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
        if($request['selesai'] == null){
            $input['selesai'] = 'false';
        }
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

        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return view('ujians.show')->with('ujian', $ujian);
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

        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return view('ujians.edit', compact('matkul', 'soal'))->with('ujian', $ujian);
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
        return view('ujians.createSoal', compact('matkul', 'ujian', 'soalPG', 'soalEssay'));
    }

    public function saveSoal($id, Request $request)
    {
        $input = $request->all();
        // return $request['benar'];
        $ujian = $this->ujianRepository->find($id);
        $jumlahSoal = $ujian['jml_pg'] + $ujian['jml_essay'];
        
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
            if($ujian['soals']->count() >= $jumlahSoal){
                Flash::success(__('messages.updated', ['model' => __('models/ujians.singular')]));
                return redirect(route('ujians.index'));
            } else {
                Flash::success(__('messages.updated', ['model' => __('models/ujians.singular')]));
                return redirect(route('ujians.createSoal', $id));
            }
        } else {
            $soal = $this->soalRepository->create($input);
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
        // return $request['kode_ujian'];
        if($ujian['kode'] == $request['kode_ujian']){
            return redirect(route('ujians.mahasiswa-ujian', $id));
        } else {
            Alert::error('Gagal', 'Kode Ujian Yang Anda Masukkan Salah');
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
}