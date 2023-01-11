<?php

namespace App\Http\Controllers;

use App\DataTables\SoalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use App\Repositories\SoalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Pilihan;
use App\Models\Soal;
use App\Models\TipeSoal;
use App\Models\Ujian;
use Response;

class SoalController extends AppBaseController
{
    /** @var  SoalRepository */
    private $soalRepository;

    public function __construct(SoalRepository $soalRepo)
    {
        $this->soalRepository = $soalRepo;
    }

    /**
     * Display a listing of the Soal.
     *
     * @param SoalDataTable $soalDataTable
     * @return Response
     */
    public function index(SoalDataTable $soalDataTable)
    {
        return $soalDataTable->render('soals.index');
    }

    /**
     * Show the form for creating a new Soal.
     *
     * @return Response
     */
    public function create()
    {
        // $ujian = Ujian::with('matkul')->get()->pluck('matkul.nama', 'id');
        $ujian = Ujian::all(['id', 'id_mata_kuliah', 'tipe_ujian', 'semester']);
        $tipeSoal = TipeSoal::pluck('nama', 'id');
        // return $ujian;
        return view('soals.create', compact('ujian', 'tipeSoal'));
    }

    /**
     * Store a newly created Soal in storage.
     *
     * @param CreateSoalRequest $request
     *
     * @return Response
     */
    public function store(CreateSoalRequest $request)
    {
        $input = $request->all();
        // return $request['benar'];
        if($request['id_tipe_soal'] == 1){
            $soal = $this->soalRepository->create($input);
            for($i=0; $i<COUNT($request['pilihan']); $i++){
                foreach($request['benar'] as $benar){
                    $pilihan = new Pilihan;
                    $soals = Soal::orderBy('id', 'desc')->first();
                    $pilihan['id_soal'] = $soals['id'];
                    $pilihan['pilihan'] = $request['pilihan'][$i];
                    if(in_array($i, $request['benar'])) {
                        $pilihan['benar'] = "true";
                    } else {
                        $pilihan['benar'] = "false";
                    }
                    $pilihan->save();
                }
            }
        } else {
            $soal = $this->soalRepository->create($input);
        }

        Flash::success(__('messages.saved', ['model' => __('models/soals.singular')]));
        return redirect(route('soals.index'));
    }

    /**
     * Display the specified Soal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $soal = $this->soalRepository->find($id);

        if (empty($soal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/soals.singular')]));

            return redirect(route('soals.index'));
        }

        return view('soals.show')->with('soal', $soal);
    }

    /**
     * Show the form for editing the specified Soal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $soal = $this->soalRepository->find($id);
        if (empty($soal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/soals.singular')]));
            return redirect(route('soals.index'));
        }
        $ujian = Ujian::with('matkul')->get()->pluck('matkul.nama', 'id');
        $tipeSoal = TipeSoal::pluck('nama', 'id');

        return view('soals.edit', compact('ujian', 'tipeSoal'))->with('soal', $soal);
    }

    /**
     * Update the specified Soal in storage.
     *
     * @param  int              $id
     * @param UpdateSoalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoalRequest $request)
    {
        $input = $request->all();
        if($request['id_tipe_soal'] == 1){
            $soal = $this->soalRepository->update($request->all(), $id);
            if($request['pilihan'] != null){
                for($i=0; $i<COUNT($request['pilihan']); $i++){
                    $pilih = Pilihan::select('id')->where('pilihan', $request['pilihan'][$i])->first();
                    $pilihan = Pilihan::where('id', $pilih['id'])->get();
                    // $pilihan = Pilihan::find($pilih);
                    // return $pilihan;
                    // $pilihan['id_soal'] = $id;
                    // $pilihan['pilihan'] = $request['pilihan'][$i];
                    if(array_key_exists($i, $request['benar']) == true) {
                        $pilihan['benar'] = "true";
                    } else {
                        $pilihan['benar'] = "false";
                    }
                    $pilihan->update(['id_soal' => $id, 'pilihan' => $request['pilihan'][$i], 'benar' => $request['benar']]);
                    // $pilihan->save();
                }
            }
        } else {
            $soal = $this->soalRepository->create($input);
        }

        Flash::success(__('messages.updated', ['model' => __('models/soals.singular')]));
        return redirect(route('ujians.edit-soal', $id));
    }

    /**
     * Remove the specified Soal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $soal = $this->soalRepository->find($id);

        if (empty($soal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/soals.singular')]));

            return redirect(route('soals.index'));
        }

        $this->soalRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/soals.singular')]));

        return redirect(route('soals.index'));
    }
}
