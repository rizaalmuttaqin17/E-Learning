<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePilihanRequest;
use App\Http\Requests\UpdatePilihanRequest;
use App\Repositories\PilihanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PilihanController extends AppBaseController
{
    /** @var  PilihanRepository */
    private $pilihanRepository;

    public function __construct(PilihanRepository $pilihanRepo)
    {
        $this->pilihanRepository = $pilihanRepo;
    }

    /**
     * Display a listing of the Pilihan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pilihans = $this->pilihanRepository->all();

        return view('pilihans.index')
            ->with('pilihans', $pilihans);
    }

    /**
     * Show the form for creating a new Pilihan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pilihans.create');
    }

    /**
     * Store a newly created Pilihan in storage.
     *
     * @param CreatePilihanRequest $request
     *
     * @return Response
     */
    public function store(CreatePilihanRequest $request)
    {
        $input = $request->all();

        $pilihan = $this->pilihanRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/pilihans.singular')]));

        return redirect(route('pilihans.index'));
    }

    /**
     * Display the specified Pilihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pilihan = $this->pilihanRepository->find($id);

        if (empty($pilihan)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pilihans.singular')]));

            return redirect(route('pilihans.index'));
        }

        return view('pilihans.show')->with('pilihan', $pilihan);
    }

    /**
     * Show the form for editing the specified Pilihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pilihan = $this->pilihanRepository->find($id);

        if (empty($pilihan)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pilihans.singular')]));

            return redirect(route('pilihans.index'));
        }

        return view('pilihans.edit')->with('pilihan', $pilihan);
    }

    /**
     * Update the specified Pilihan in storage.
     *
     * @param int $id
     * @param UpdatePilihanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePilihanRequest $request)
    {
        $pilihan = $this->pilihanRepository->find($id);

        if (empty($pilihan)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pilihans.singular')]));

            return redirect(route('pilihans.index'));
        }

        $pilihan = $this->pilihanRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/pilihans.singular')]));

        return redirect(route('pilihans.index'));
    }

    /**
     * Remove the specified Pilihan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pilihan = $this->pilihanRepository->find($id);

        if (empty($pilihan)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pilihans.singular')]));

            return redirect(route('pilihans.index'));
        }

        $this->pilihanRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/pilihans.singular')]));

        return redirect(route('pilihans.index'));
    }
}
