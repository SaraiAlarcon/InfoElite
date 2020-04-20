<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatealumnoAPIRequest;
use App\Http\Requests\API\UpdatealumnoAPIRequest;
use App\Models\alumno;
use App\Repositories\alumnoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class alumnoController
 * @package App\Http\Controllers\API
 */

class alumnoAPIController extends AppBaseController
{
    /** @var  alumnoRepository */
    private $alumnoRepository;

    public function __construct(alumnoRepository $alumnoRepo)
    {
        $this->alumnoRepository = $alumnoRepo;
    }

    /**
     * Display a listing of the alumno.
     * GET|HEAD /alumnos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $alumnos = $this->alumnoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($alumnos->toArray(), 'Alumnos retrieved successfully');
    }

    /**
     * Store a newly created alumno in storage.
     * POST /alumnos
     *
     * @param CreatealumnoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatealumnoAPIRequest $request)
    {
        $input = $request->all();

        $alumno = $this->alumnoRepository->create($input);

        return $this->sendResponse($alumno->toArray(), 'Alumno saved successfully');
    }

    /**
     * Display the specified alumno.
     * GET|HEAD /alumnos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var alumno $alumno */
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            return $this->sendError('Alumno not found');
        }

        return $this->sendResponse($alumno->toArray(), 'Alumno retrieved successfully');
    }

    /**
     * Update the specified alumno in storage.
     * PUT/PATCH /alumnos/{id}
     *
     * @param int $id
     * @param UpdatealumnoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatealumnoAPIRequest $request)
    {
        $input = $request->all();

        /** @var alumno $alumno */
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            return $this->sendError('Alumno not found');
        }

        $alumno = $this->alumnoRepository->update($input, $id);

        return $this->sendResponse($alumno->toArray(), 'alumno updated successfully');
    }

    /**
     * Remove the specified alumno from storage.
     * DELETE /alumnos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var alumno $alumno */
        $alumno = $this->alumnoRepository->find($id);

        if (empty($alumno)) {
            return $this->sendError('Alumno not found');
        }

        $alumno->delete();

        return $this->sendSuccess('Alumno deleted successfully');
    }
}
