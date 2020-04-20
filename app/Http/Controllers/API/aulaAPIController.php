<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateaulaAPIRequest;
use App\Http\Requests\API\UpdateaulaAPIRequest;
use App\Models\aula;
use App\Repositories\aulaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class aulaController
 * @package App\Http\Controllers\API
 */

class aulaAPIController extends AppBaseController
{
    /** @var  aulaRepository */
    private $aulaRepository;

    public function __construct(aulaRepository $aulaRepo)
    {
        $this->aulaRepository = $aulaRepo;
    }

    /**
     * Display a listing of the aula.
     * GET|HEAD /aulas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aulas = $this->aulaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($aulas->toArray(), 'Aulas retrieved successfully');
    }

    /**
     * Store a newly created aula in storage.
     * POST /aulas
     *
     * @param CreateaulaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateaulaAPIRequest $request)
    {
        $input = $request->all();

        $aula = $this->aulaRepository->create($input);

        return $this->sendResponse($aula->toArray(), 'Aula saved successfully');
    }

    /**
     * Display the specified aula.
     * GET|HEAD /aulas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var aula $aula */
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            return $this->sendError('Aula not found');
        }

        return $this->sendResponse($aula->toArray(), 'Aula retrieved successfully');
    }

    /**
     * Update the specified aula in storage.
     * PUT/PATCH /aulas/{id}
     *
     * @param int $id
     * @param UpdateaulaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaulaAPIRequest $request)
    {
        $input = $request->all();

        /** @var aula $aula */
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            return $this->sendError('Aula not found');
        }

        $aula = $this->aulaRepository->update($input, $id);

        return $this->sendResponse($aula->toArray(), 'aula updated successfully');
    }

    /**
     * Remove the specified aula from storage.
     * DELETE /aulas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var aula $aula */
        $aula = $this->aulaRepository->find($id);

        if (empty($aula)) {
            return $this->sendError('Aula not found');
        }

        $aula->delete();

        return $this->sendSuccess('Aula deleted successfully');
    }
}
