<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Repositories\usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\privilegio;

class usersController extends AppBaseController
{
    /** @var  usersRepository */
    private $usersRepository;

    public function __construct(usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->usersRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new users.
     *
     * @return Response
     */
    public function create()
    {
        $list_privilegio = privilegio::all()->pluck('nombre', 'id')->prepend('Seleccionar Privilegio', '');
        return view('users.create')
            ->with('listPrivilegio', $list_privilegio);
    }

    /**
     * Store a newly created users in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();

        $password = bcrypt($input['password']);
        $input['password'] = $password;
        $input['remember_token'] = $input['_token'];

        $users = $this->usersRepository->create($input);

        Flash::success('Usuario Guardado exitosamente.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        $list_privilegio = privilegio::all()->pluck('nombre', 'id')->prepend('Seleccionar Privilegio', '');
        return view('users.edit')->with('users', $users)
            ->with('listPrivilegio', $list_privilegio);
    }

    /**
     * Update the specified users in storage.
     *
     * @param int $id
     * @param UpdateusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusersRequest $request)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            unset($input['password']);
        }

        $users = $this->usersRepository->update($input, $id);

        Flash::success('Usuario actualizado con éxito.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Usuario borrado exitosamente.');

        return redirect(route('users.index'));
    }
}
