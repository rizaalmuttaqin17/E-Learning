<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipeSoalRequest;
use App\Http\Requests\UpdateTipeSoalRequest;
use App\Repositories\TipeSoalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipeSoalController extends AppBaseController
{
    /** @var  TipeSoalRepository */
    private $tipeSoalRepository;

    public function __construct(TipeSoalRepository $tipeSoalRepo)
    {
        $this->tipeSoalRepository = $tipeSoalRepo;
    }

    /**
     * Display a listing of the TipeSoal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipeSoals = $this->tipeSoalRepository->all();

        return view('tipe_soals.index')
            ->with('tipeSoals', $tipeSoals);
    }

    /**
     * Show the form for creating a new TipeSoal.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipe_soals.create');
    }

    /**
     * Store a newly created TipeSoal in storage.
     *
     * @param CreateTipeSoalRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeSoalRequest $request)
    {
        $input = $request->all();

        $tipeSoal = $this->tipeSoalRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tipeSoals.singular')]));

        return redirect(route('tipeSoals.index'));
    }

    /**
     * Display the specified TipeSoal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipeSoal = $this->tipeSoalRepository->find($id);

        if (empty($tipeSoal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipeSoals.singular')]));

            return redirect(route('tipeSoals.index'));
        }

        return view('tipe_soals.show')->with('tipeSoal', $tipeSoal);
    }

    /**
     * Show the form for editing the specified TipeSoal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipeSoal = $this->tipeSoalRepository->find($id);

        if (empty($tipeSoal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipeSoals.singular')]));

            return redirect(route('tipeSoals.index'));
        }

        return view('tipe_soals.edit')->with('tipeSoal', $tipeSoal);
    }

    /**
     * Update the specified TipeSoal in storage.
     *
     * @param int $id
     * @param UpdateTipeSoalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeSoalRequest $request)
    {
        $tipeSoal = $this->tipeSoalRepository->find($id);

        if (empty($tipeSoal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipeSoals.singular')]));

            return redirect(route('tipeSoals.index'));
        }

        $tipeSoal = $this->tipeSoalRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tipeSoals.singular')]));

        return redirect(route('tipeSoals.index'));
    }

    /**
     * Remove the specified TipeSoal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipeSoal = $this->tipeSoalRepository->find($id);

        if (empty($tipeSoal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tipeSoals.singular')]));

            return redirect(route('tipeSoals.index'));
        }

        $this->tipeSoalRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tipeSoals.singular')]));

        return redirect(route('tipeSoals.index'));
    }
}
