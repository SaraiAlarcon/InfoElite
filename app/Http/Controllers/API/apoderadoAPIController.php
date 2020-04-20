<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateapoderadoAPIRequest;
use App\Http\Requests\API\UpdateapoderadoAPIRequest;
use App\Models\apoderado;
use App\Repositories\apoderadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class apoderadoController
 * @package App\Http\Controllers\API
 */

class apoderadoAPIController extends AppBaseController
{
    /** @var  apoderadoRepository */
    private $apoderadoRepository;

    public function __construct(apoderadoRepository $apoderadoRepo)
    {
        $this->apoderadoRepository = $apoderadoRepo;
    }

    /**
     * Display a listing of the apoderado.
     * GET|HEAD /apoderados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $apoderados = $this->apoderadoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($apoderados->toArray(), 'Apoderados retrieved successfully');
    }

    /**
     * Store a newly created apoderado in storage.
     * POST /apoderados
     *
     * @param CreateapoderadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateapoderadoAPIRequest $request)
    {
        $input = $request->all();

        $apoderado = $this->apoderadoRepository->create($input);

        return $this->sendResponse($apoderado->toArray(), 'Apoderado saved successfully');
    }

    /**
     * Display the specified apoderado.
     * GET|HEAD /apoderados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var apoderado $apoderado */
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            return $this->sendError('Apoderado not found');
        }

        return $this->sendResponse($apoderado->toArray(), 'Apoderado retrieved successfully');
    }

    /**
     * Update the specified apoderado in storage.
     * PUT/PATCH /apoderados/{id}
     *
     * @param int $id
     * @param UpdateapoderadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateapoderadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var apoderado $apoderado */
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            return $this->sendError('Apoderado not found');
        }

        $apoderado = $this->apoderadoRepository->update($input, $id);

        return $this->sendResponse($apoderado->toArray(), 'apoderado updated successfully');
    }

    /**
     * Remove the specified apoderado from storage.
     * DELETE /apoderados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var apoderado $apoderado */
        $apoderado = $this->apoderadoRepository->find($id);

        if (empty($apoderado)) {
            return $this->sendError('Apoderado not found');
        }

        $apoderado->delete();

        return $this->sendSuccess('Apoderado deleted successfully');
    }
}
