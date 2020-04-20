<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatematriculaRequest;
use App\Http\Requests\UpdatematriculaRequest;
use App\Repositories\matriculaRepository;
use App\Repositories\alumnoRepository;
use App\Repositories\apoderadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\grado;
use App\Models\alumno;
use App\Models\apoderado;
use App\Models\pagos;

class matriculaController extends AppBaseController
{
    /** @var  matriculaRepository */
    /** @var  alumnoRepository */
    /** @var  apoderadoRepository */
    private $apoderadoRepository;
    private $matriculaRepository;
    private $alumnoRepository;

    public function __construct(matriculaRepository $matriculaRepo, alumnoRepository $alumnoRepo, apoderadoRepository $apoderadoRepo)
    {
        $this->matriculaRepository = $matriculaRepo;
        $this->alumnoRepository = $alumnoRepo;
        $this->apoderadoRepository = $apoderadoRepo;
    }

    /**
     * Display a listing of the matricula.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $matriculas = $this->matriculaRepository->all();

        return view('matriculas.index')
            ->with('matriculas', $matriculas);
    }

    /**
     * Show the form for creating a new matricula.
     *
     * @return Response
     */
    public function create()
    {
        $list_grado = grado::all()->pluck('descripcion', 'id')->prepend('Seleccionar Grado', '');
        return view('matriculas.create')
            ->with('listGrado', $list_grado);
    }

    /**
     * Store a newly created matricula in storage.
     *
     * @param CreatematriculaRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'dni_apoderado' => 'required',
            'nombres_a' => 'required',
            'apellidos_a' => 'required',
            'telefono' => 'required',
            'idgrado' => 'required',
            'colegio_procedencia' => 'required'
        ]);

        $input = $request->all();

        $alumnos = alumno::create($input);
        $apoderados = apoderado::create($input);

        $input["idalumno"] = $alumnos->id;
        $input["idapoderado"] = $apoderados->id;
        $matricula = $this->matriculaRepository->create($input);

        Flash::success('Matricula Guardado exitosamente.');

        return redirect(route('matriculas.index'));
    }

    /**
     * Display the specified matricula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error('Matricula not found');

            return redirect(route('matriculas.index'));
        }

        return view('matriculas.show')->with('matricula', $matricula);
    }

    /**
     * Show the form for editing the specified matricula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error('Matricula not found');

            return redirect(route('matriculas.index'));
        }
        $list_grado = grado::all()->pluck('descripcion', 'id')->prepend('Seleccionar Grado', '');
        return view('matriculas.edit')->with('matricula', $matricula)
            ->with('listGrado', $list_grado);
    }

    /**
     * Update the specified matricula in storage.
     *
     * @param int $id
     * @param UpdatematriculaRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error('Matricula not found');

            return redirect(route('matriculas.index'));
        }

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'dni_apoderado' => 'required',
            'nombres_a' => 'required',
            'apellidos_a' => 'required',
            'telefono' => 'required',
            'idgrado' => 'required',
            'colegio_procedencia' => 'required'
        ]);

        $input = $request->all();

        $this->alumnoRepository->update($input, $input["idalumno"]);
        $this->apoderadoRepository->update($input, $input["idapoderado"]);

        $matricula = $this->matriculaRepository->update($input, $id);

        Flash::success('Matricula actualizado con éxito');

        return redirect(route('matriculas.index'));
    }

    /**
     * Remove the specified matricula from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error('Matricula not found');

            return redirect(route('matriculas.index'));
        }
        $pago = pagos::all();
        foreach ($pago as $item) {
            pagos::where('idmatricula', $id)->delete();
        }
        $this->alumnoRepository->delete($matricula->idalumno);
        $this->apoderadoRepository->delete($matricula->idapoderado);
        $this->matriculaRepository->delete($id);

        Flash::success('Matricula borrado exitosamente.');

        return redirect(route('matriculas.index'));
    }
}
