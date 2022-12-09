<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFakultasRequest;
use App\Http\Requests\UpdateFakultasRequest;
use App\Repositories\FakultasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FakultasController extends AppBaseController
{
    /** @var  FakultasRepository */
    private $fakultasRepository;

    public function __construct(FakultasRepository $fakultasRepo)
    {
        $this->fakultasRepository = $fakultasRepo;
    }

    /**
     * Display a listing of the Fakultas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fakultas = $this->fakultasRepository->all();

        return view('fakultas.index')
            ->with('fakultas', $fakultas);
    }

    /**
     * Show the form for creating a new Fakultas.
     *
     * @return Response
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created Fakultas in storage.
     *
     * @param CreateFakultasRequest $request
     *
     * @return Response
     */
    public function store(CreateFakultasRequest $request)
    {
        $input = $request->all();

        $fakultas = $this->fakultasRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fakultas.singular')]));

        return redirect(route('fakultas.index'));
    }

    /**
     * Display the specified Fakultas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fakultas = $this->fakultasRepository->find($id);

        if (empty($fakultas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fakultas.singular')]));

            return redirect(route('fakultas.index'));
        }

        return view('fakultas.show')->with('fakultas', $fakultas);
    }

    /**
     * Show the form for editing the specified Fakultas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fakultas = $this->fakultasRepository->find($id);

        if (empty($fakultas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fakultas.singular')]));

            return redirect(route('fakultas.index'));
        }

        return view('fakultas.edit')->with('fakultas', $fakultas);
    }

    /**
     * Update the specified Fakultas in storage.
     *
     * @param int $id
     * @param UpdateFakultasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFakultasRequest $request)
    {
        $fakultas = $this->fakultasRepository->find($id);

        if (empty($fakultas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fakultas.singular')]));

            return redirect(route('fakultas.index'));
        }

        $fakultas = $this->fakultasRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fakultas.singular')]));

        return redirect(route('fakultas.index'));
    }

    /**
     * Remove the specified Fakultas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fakultas = $this->fakultasRepository->find($id);

        if (empty($fakultas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fakultas.singular')]));

            return redirect(route('fakultas.index'));
        }

        $this->fakultasRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fakultas.singular')]));

        return redirect(route('fakultas.index'));
    }
}
