<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramStudiRequest;
use App\Http\Requests\UpdateProgramStudiRequest;
use App\Repositories\ProgramStudiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProgramStudiController extends AppBaseController
{
    /** @var  ProgramStudiRepository */
    private $programStudiRepository;

    public function __construct(ProgramStudiRepository $programStudiRepo)
    {
        $this->programStudiRepository = $programStudiRepo;
    }

    /**
     * Display a listing of the ProgramStudi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $programStudis = $this->programStudiRepository->all();

        return view('program_studis.index')
            ->with('programStudis', $programStudis);
    }

    /**
     * Show the form for creating a new ProgramStudi.
     *
     * @return Response
     */
    public function create()
    {
        return view('program_studis.create');
    }

    /**
     * Store a newly created ProgramStudi in storage.
     *
     * @param CreateProgramStudiRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramStudiRequest $request)
    {
        $input = $request->all();

        $programStudi = $this->programStudiRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/programStudis.singular')]));

        return redirect(route('programStudis.index'));
    }

    /**
     * Display the specified ProgramStudi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $programStudi = $this->programStudiRepository->find($id);

        if (empty($programStudi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/programStudis.singular')]));

            return redirect(route('programStudis.index'));
        }

        return view('program_studis.show')->with('programStudi', $programStudi);
    }

    /**
     * Show the form for editing the specified ProgramStudi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $programStudi = $this->programStudiRepository->find($id);

        if (empty($programStudi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/programStudis.singular')]));

            return redirect(route('programStudis.index'));
        }

        return view('program_studis.edit')->with('programStudi', $programStudi);
    }

    /**
     * Update the specified ProgramStudi in storage.
     *
     * @param int $id
     * @param UpdateProgramStudiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramStudiRequest $request)
    {
        $programStudi = $this->programStudiRepository->find($id);

        if (empty($programStudi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/programStudis.singular')]));

            return redirect(route('programStudis.index'));
        }

        $programStudi = $this->programStudiRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/programStudis.singular')]));

        return redirect(route('programStudis.index'));
    }

    /**
     * Remove the specified ProgramStudi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $programStudi = $this->programStudiRepository->find($id);

        if (empty($programStudi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/programStudis.singular')]));

            return redirect(route('programStudis.index'));
        }

        $this->programStudiRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/programStudis.singular')]));

        return redirect(route('programStudis.index'));
    }
}
