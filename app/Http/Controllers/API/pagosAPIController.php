<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepagosAPIRequest;
use App\Http\Requests\API\UpdatepagosAPIRequest;
use App\Models\pagos;
use App\Repositories\pagosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class pagosController
 * @package App\Http\Controllers\API
 */

class pagosAPIController extends AppBaseController
{
    /** @var  pagosRepository */
    private $pagosRepository;

    public function __construct(pagosRepository $pagosRepo)
    {
        $this->pagosRepository = $pagosRepo;
    }

    /**
     * Display a listing of the pagos.
     * GET|HEAD /pagos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pagos = $this->pagosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pagos->toArray(), 'Pagos retrieved successfully');
    }

    /**
     * Store a newly created pagos in storage.
     * POST /pagos
     *
     * @param CreatepagosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepagosAPIRequest $request)
    {
        $input = $request->all();

        $pagos = $this->pagosRepository->create($input);

        return $this->sendResponse($pagos->toArray(), 'Pagos saved successfully');
    }

    /**
     * Display the specified pagos.
     * GET|HEAD /pagos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var pagos $pagos */
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            return $this->sendError('Pagos not found');
        }

        return $this->sendResponse($pagos->toArray(), 'Pagos retrieved successfully');
    }

    /**
     * Update the specified pagos in storage.
     * PUT/PATCH /pagos/{id}
     *
     * @param int $id
     * @param UpdatepagosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepagosAPIRequest $request)
    {
        $input = $request->all();

        /** @var pagos $pagos */
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            return $this->sendError('Pagos not found');
        }

        $pagos = $this->pagosRepository->update($input, $id);

        return $this->sendResponse($pagos->toArray(), 'pagos updated successfully');
    }

    /**
     * Remove the specified pagos from storage.
     * DELETE /pagos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var pagos $pagos */
        $pagos = $this->pagosRepository->find($id);

        if (empty($pagos)) {
            return $this->sendError('Pagos not found');
        }

        $pagos->delete();

        return $this->sendSuccess('Pagos deleted successfully');
    }
}
