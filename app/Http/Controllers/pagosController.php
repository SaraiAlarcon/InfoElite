<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepagosRequest;
use App\Http\Requests\UpdatepagosRequest;
use App\Repositories\pagosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\matricula;

class pagosController extends AppBaseController
{
    /** @var  pagosRepository */
    private $pagosRepository;

    public function __construct(pagosRepository $pagosRepo)
    {
        $this->pagosRepository = $pagosRepo;
    }

    /**
     * Display a listing of the pagos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pagos = $this->pagosRepository->all();

        return view('pagos.index')
            ->with('pagos', $pagos);
    }

    /**
     * Show the form for creating a new pagos.
     *
     * @return Response
     */
    public function create()
    {
        $alumnos = matricula::all();
        return view('pagos.create')
            ->with('alumnos', $alumnos);
    }

    /**
     * Store a newly created pagos in storage.
     *
     * @param CreatepagosRequest $request
     *
     * @return Response
     */
    public function store(CreatepagosRequest $request)
    {
        $input = $request->all();

        $pagos = $this->pagosRepository->create($input);

        Flash::success('Pagos Guardado exitosamente.');

        return redirect(route('pagos.index'));
    }

    /**
     * Display the specified pagos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            Flash::error('Pagos not found');

            return redirect(route('pagos.index'));
        }

        return view('pagos.show')->with('pagos', $pagos);
    }

    /**
     * Show the form for editing the specified pagos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            Flash::error('Pagos not found');

            return redirect(route('pagos.index'));
        }
        $alumnos = matricula::all();
        return view('pagos.edit')->with('pagos', $pagos)
            ->with('alumnos', $alumnos);
    }

    /**
     * Update the specified pagos in storage.
     *
     * @param int $id
     * @param UpdatepagosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepagosRequest $request)
    {
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            Flash::error('Pagos not found');

            return redirect(route('pagos.index'));
        }

        $pagos = $this->pagosRepository->update($request->all(), $id);

        Flash::success('Pagos actualizado con éxito.');

        return redirect(route('pagos.index'));
    }

    /**
     * Remove the specified pagos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            Flash::error('Pagos not found');

            return redirect(route('pagos.index'));
        }

        $this->pagosRepository->delete($id);

        Flash::success('Pagos borrado exitosamente.');

        return redirect(route('pagos.index'));
    }
}
