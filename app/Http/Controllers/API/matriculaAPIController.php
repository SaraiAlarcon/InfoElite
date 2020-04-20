<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatematriculaAPIRequest;
use App\Http\Requests\API\UpdatematriculaAPIRequest;
use App\Models\matricula;
use App\Repositories\matriculaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class matriculaController
 * @package App\Http\Controllers\API
 */

class matriculaAPIController extends AppBaseController
{
    /** @var  matriculaRepository */
    private $matriculaRepository;

    public function __construct(matriculaRepository $matriculaRepo)
    {
        $this->matriculaRepository = $matriculaRepo;
    }

    /**
     * Display a listing of the matricula.
     * GET|HEAD /matriculas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $matriculas = $this->matriculaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($matriculas->toArray(), 'Matriculas retrieved successfully');
    }

    /**
     * Store a newly created matricula in storage.
     * POST /matriculas
     *
     * @param CreatematriculaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatematriculaAPIRequest $request)
    {
        $input = $request->all();

        $matricula = $this->matriculaRepository->create($input);

        return $this->sendResponse($matricula->toArray(), 'Matricula saved successfully');
    }

    /**
     * Display the specified matricula.
     * GET|HEAD /matriculas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var matricula $matricula */
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            return $this->sendError('Matricula not found');
        }

        return $this->sendResponse($matricula->toArray(), 'Matricula retrieved successfully');
    }

    /**
     * Update the specified matricula in storage.
     * PUT/PATCH /matriculas/{id}
     *
     * @param int $id
     * @param UpdatematriculaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatematriculaAPIRequest $request)
    {
        $input = $request->all();

        /** @var matricula $matricula */
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            return $this->sendError('Matricula not found');
        }

        $matricula = $this->matriculaRepository->update($input, $id);

        return $this->sendResponse($matricula->toArray(), 'matricula updated successfully');
    }

    /**
     * Remove the specified matricula from storage.
     * DELETE /matriculas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var matricula $matricula */
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            return $this->sendError('Matricula not found');
        }

        $matricula->delete();

        return $this->sendSuccess('Matricula deleted successfully');
    }
}
