<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategradoRequest;
use App\Http\Requests\UpdategradoRequest;
use App\Repositories\gradoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class gradoController extends AppBaseController
{
    /** @var  gradoRepository */
    private $gradoRepository;

    public function __construct(gradoRepository $gradoRepo)
    {
        $this->gradoRepository = $gradoRepo;
    }

    /**
     * Display a listing of the grado.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $grados = $this->gradoRepository->all();

        return view('grados.index')
            ->with('grados', $grados);
    }

    /**
     * Show the form for creating a new grado.
     *
     * @return Response
     */
    public function create()
    {
        return view('grados.create');
    }

    /**
     * Store a newly created grado in storage.
     *
     * @param CreategradoRequest $request
     *
     * @return Response
     */
    public function store(CreategradoRequest $request)
    {
        $input = $request->all();

        $grado = $this->gradoRepository->create($input);

        Flash::success('Grado saved successfully.');

        return redirect(route('grados.index'));
    }

    /**
     * Display the specified grado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grado = $this->gradoRepository->find($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        return view('grados.show')->with('grado', $grado);
    }

    /**
     * Show the form for editing the specified grado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grado = $this->gradoRepository->find($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        return view('grados.edit')->with('grado', $grado);
    }

    /**
     * Update the specified grado in storage.
     *
     * @param int $id
     * @param UpdategradoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategradoRequest $request)
    {
        $grado = $this->gradoRepository->find($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        $grado = $this->gradoRepository->update($request->all(), $id);

        Flash::success('Grado updated successfully.');

        return redirect(route('grados.index'));
    }

    /**
     * Remove the specified grado from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grado = $this->gradoRepository->find($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        $this->gradoRepository->delete($id);

        Flash::success('Grado deleted successfully.');

        return redirect(route('grados.index'));
    }
}
