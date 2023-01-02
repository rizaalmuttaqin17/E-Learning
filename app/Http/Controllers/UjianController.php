<?php

namespace App\Http\Controllers;

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
        // return $soal;
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

        if (empty($ujian)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ujians.singular')]));
            return redirect(route('ujians.index'));
        }
        return view('ujians.edit', compact('matkul'))->with('ujian', $ujian);
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

        $matkul = MataKuliah::pluck('nama', 'id');
        return view('ujians.createSoal', compact('matkul', 'ujian'));
    }

    public function updateSoal($id, Request $request)
    {
        $input = $request->all();
        // return $request['benar'];
        $ujian = $this->ujianRepository->find($id);
        
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
                    // return $request['benar'];
                    $pilihan['benar'] = "true";
                } else {
                    // return $request['benar'];
                    $pilihan['benar'] = "false";
                }
                $pilihan->save();
            }
            if($ujian['soals']->count() != $ujian['jumlah_soal']){
                $matkul = MataKuliah::pluck('nama', 'id');
                Flash::success(__('messages.updated', ['model' => __('models/ujians.singular')]));
                return view('ujians.createSoal', compact('matkul', 'ujian'));
            } else {
                Flash::success(__('messages.updated', ['model' => __('models/ujians.singular')]));
                return redirect(route('ujians.index'));
            }
        } else {
            $soal = $this->soalRepository->create($input);
        }
    }

    public function ujiansMahasiswa($id){
        $ujian = $this->ujianRepository->find($id);
        $jawabans = Jawaban::where('id_user', Auth::id())->get();
        $soals = Soal::where('id_ujian', $id)->get()->random();
        
        foreach($soals as $item){
            $jawaban = Jawaban::where('id_user', Auth::id())->where('id_soal', $item)->first();
            $jawabanTotal = Jawaban::where('id_user', Auth::id())->orWhere('id_soal', $soals['id'])->get();
            // return $jawabanTotal;
            if($jawaban == null){
                $soal = $soals;
            } else {
                if(count($jawabanTotal) == $ujian['jumlah_soal']){
                    Alert::warning('Gagal', 'Anda Telah Mengambil Ujian Ini!');
                    return redirect(route('ujians.index'));
                } else {
                    $soal = Soal::where('id_ujian', $id)->orWhere('id', '!=', $jawaban['id_soal'])->get()->random();
                }
            }
        }
        // return $soal;
        
        $matkul = MataKuliah::pluck('nama', 'id');
        return view('ujians.mhs_ujian', compact('matkul', 'ujian', 'soal'));
    }

    public function nextSoal($id, Request $request){
        $soal = Soal::where('id', $id)->first();

        $jawab = new Jawaban;
        $jawab['id_user'] = Auth::id();
        $jawab['id_soal'] = $soal['id'];
        $jawab['id_pilihan'] = $request['answer'];
        $jawab->save();

        return redirect()->back();
    }
}