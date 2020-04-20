<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateprivilegioAPIRequest;
use App\Http\Requests\API\UpdateprivilegioAPIRequest;
use App\Models\privilegio;
use App\Repositories\privilegioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class privilegioController
 * @package App\Http\Controllers\API
 */

class privilegioAPIController extends AppBaseController
{
    /** @var  privilegioRepository */
    private $privilegioRepository;

    public function __construct(privilegioRepository $privilegioRepo)
    {
        $this->privilegioRepository = $privilegioRepo;
    }

    /**
     * Display a listing of the privilegio.
     * GET|HEAD /privilegios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $privilegios = $this->privilegioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($privilegios->toArray(), 'Privilegios retrieved successfully');
    }

    /**
     * Store a newly created privilegio in storage.
     * POST /privilegios
     *
     * @param CreateprivilegioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateprivilegioAPIRequest $request)
    {
        $input = $request->all();

        $privilegio = $this->privilegioRepository->create($input);

        return $this->sendResponse($privilegio->toArray(), 'Privilegio saved successfully');
    }

    /**
     * Display the specified privilegio.
     * GET|HEAD /privilegios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var privilegio $privilegio */
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            return $this->sendError('Privilegio not found');
        }

        return $this->sendResponse($privilegio->toArray(), 'Privilegio retrieved successfully');
    }

    /**
     * Update the specified privilegio in storage.
     * PUT/PATCH /privilegios/{id}
     *
     * @param int $id
     * @param UpdateprivilegioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprivilegioAPIRequest $request)
    {
        $input = $request->all();

        /** @var privilegio $privilegio */
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            return $this->sendError('Privilegio not found');
        }

        $privilegio = $this->privilegioRepository->update($input, $id);

        return $this->sendResponse($privilegio->toArray(), 'privilegio updated successfully');
    }

    /**
     * Remove the specified privilegio from storage.
     * DELETE /privilegios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var privilegio $privilegio */
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            return $this->sendError('Privilegio not found');
        }

        $privilegio->delete();

        return $this->sendSuccess('Privilegio deleted successfully');
    }
}
