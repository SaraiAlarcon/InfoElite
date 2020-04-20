<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaulaRequest;
use App\Http\Requests\UpdateaulaRequest;
use App\Repositories\aulaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\grado;
use App\Models\aula;

class aulaController extends AppBaseController
{
    /** @var  aulaRepository */
    private $aulaRepository;

    public function __construct(aulaRepository $aulaRepo)
    {
        $this->aulaRepository = $aulaRepo;
    }

    /**
     * Display a listing of the aula.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function setSeccion(Request $request)
    {

        $aulas = aula::orderBy('seccion')
        ->where('idgrado',$request->idgrado)
        ->get();
        ?>
        <option value>Seleccionar Seccion</option>
        <?php foreach ($aulas as $item) { ?>
            <option value="<?= $item->id; ?>"><?= $item->seccion; ?></option>
        <?php
        }
    }

    public function index(Request $request)
    {
        $aulas = $this->aulaRepository->all();

        return view('aulas.index')
            ->with('aulas', $aulas);
    }

    /**
     * Show the form for creating a new aula.
     *
     * @return Response
     */
    public function create()
    {
        $list_grado = grado::all()->pluck('descripcion', 'id')->prepend('Seleccionar Grado', '');
        return view('aulas.create')
            ->with('listGrado', $list_grado);
    }

    /**
     * Store a newly created aula in storage.
     *
     * @param CreateaulaRequest $request
     *
     * @return Response
     */
    public function store(CreateaulaRequest $request)
    {
        $input = $request->all();

        $aula = $this->aulaRepository->create($input);

        Flash::success('Aula Guardado exitosamente.');

        return redirect(route('aulas.index'));
    }

    /**
     * Display the specified aula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            Flash::error('Aula not found');

            return redirect(route('aulas.index'));
        }

        return view('aulas.show')->with('aula', $aula);
    }

    /**
     * Show the form for editing the specified aula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            Flash::error('Aula not found');

            return redirect(route('aulas.index'));
        }
        $list_grado = grado::all()->pluck('descripcion', 'id')->prepend('Seleccionar Grado', '');
        return view('aulas.edit')->with('aula', $aula)
            ->with('listGrado', $list_grado);
    }

    /**
     * Update the specified aula in storage.
     *
     * @param int $id
     * @param UpdateaulaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaulaRequest $request)
    {
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            Flash::error('Aula not found');

            return redirect(route('aulas.index'));
        }

        $aula = $this->aulaRepository->update($request->all(), $id);

        Flash::success('Aula actualizado con éxito.');

        return redirect(route('aulas.index'));
    }

    /**
     * Remove the specified aula from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            Flash::error('Aula not found');

            return redirect(route('aulas.index'));
        }

        $this->aulaRepository->delete($id);

        Flash::success('Aula borrado exitosamente.');

        return redirect(route('aulas.index'));
    }
}
