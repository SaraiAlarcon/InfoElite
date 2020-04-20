<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateapoderadoRequest;
use App\Http\Requests\UpdateapoderadoRequest;
use App\Repositories\apoderadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class apoderadoController extends AppBaseController
{
    /** @var  apoderadoRepository */
    private $apoderadoRepository;

    public function __construct(apoderadoRepository $apoderadoRepo)
    {
        $this->apoderadoRepository = $apoderadoRepo;
    }

    /**
     * Display a listing of the apoderado.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $apoderados = $this->apoderadoRepository->all();

        return view('apoderados.index')
            ->with('apoderados', $apoderados);
    }

    /**
     * Show the form for creating a new apoderado.
     *
     * @return Response
     */
    public function create()
    {
        return view('apoderados.create');
    }

    /**
     * Store a newly created apoderado in storage.
     *
     * @param CreateapoderadoRequest $request
     *
     * @return Response
     */
    public function store(CreateapoderadoRequest $request)
    {
        $input = $request->all();

        $apoderado = $this->apoderadoRepository->create($input);

        Flash::success('Apoderado saved successfully.');

        return redirect(route('apoderados.index'));
    }

    /**
     * Display the specified apoderado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        return view('apoderados.show')->with('apoderado', $apoderado);
    }

    /**
     * Show the form for editing the specified apoderado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        return view('apoderados.edit')->with('apoderado', $apoderado);
    }

    /**
     * Update the specified apoderado in storage.
     *
     * @param int $id
     * @param UpdateapoderadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateapoderadoRequest $request)
    {
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        $apoderado = $this->apoderadoRepository->update($request->all(), $id);

        Flash::success('Apoderado updated successfully.');

        return redirect(route('apoderados.index'));
    }

    /**
     * Remove the specified apoderado from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        $this->apoderadoRepository->delete($id);

        Flash::success('Apoderado deleted successfully.');

        return redirect(route('apoderados.index'));
    }
}
