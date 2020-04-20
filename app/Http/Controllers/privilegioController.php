<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprivilegioRequest;
use App\Http\Requests\UpdateprivilegioRequest;
use App\Repositories\privilegioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class privilegioController extends AppBaseController
{
    /** @var  privilegioRepository */
    private $privilegioRepository;

    public function __construct(privilegioRepository $privilegioRepo)
    {
        $this->privilegioRepository = $privilegioRepo;
    }

    /**
     * Display a listing of the privilegio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $privilegios = $this->privilegioRepository->all();

        return view('privilegios.index')
            ->with('privilegios', $privilegios);
    }

    /**
     * Show the form for creating a new privilegio.
     *
     * @return Response
     */
    public function create()
    {
        return view('privilegios.create');
    }

    /**
     * Store a newly created privilegio in storage.
     *
     * @param CreateprivilegioRequest $request
     *
     * @return Response
     */
    public function store(CreateprivilegioRequest $request)
    {
        $input = $request->all();

        $privilegio = $this->privilegioRepository->create($input);

        Flash::success('Privilegio saved successfully.');

        return redirect(route('privilegios.index'));
    }

    /**
     * Display the specified privilegio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            Flash::error('Privilegio not found');

            return redirect(route('privilegios.index'));
        }

        return view('privilegios.show')->with('privilegio', $privilegio);
    }

    /**
     * Show the form for editing the specified privilegio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            Flash::error('Privilegio not found');

            return redirect(route('privilegios.index'));
        }

        return view('privilegios.edit')->with('privilegio', $privilegio);
    }

    /**
     * Update the specified privilegio in storage.
     *
     * @param int $id
     * @param UpdateprivilegioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprivilegioRequest $request)
    {
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            Flash::error('Privilegio not found');

            return redirect(route('privilegios.index'));
        }

        $privilegio = $this->privilegioRepository->update($request->all(), $id);

        Flash::success('Privilegio updated successfully.');

        return redirect(route('privilegios.index'));
    }

    /**
     * Remove the specified privilegio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $privilegio = $this->privilegioRepository->find($id);

        if (empty($privilegio)) {
            Flash::error('Privilegio not found');

            return redirect(route('privilegios.index'));
        }

        $this->privilegioRepository->delete($id);

        Flash::success('Privilegio deleted successfully.');

        return redirect(route('privilegios.index'));
    }
}
