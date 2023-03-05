<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFueroRequest;
use App\Http\Requests\UpdateFueroRequest;
use App\Repositories\FueroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FueroController extends AppBaseController
{
    /** @var FueroRepository $fueroRepository*/
    private $fueroRepository;

    public function __construct(FueroRepository $fueroRepo)
    {
        $this->fueroRepository = $fueroRepo;
    }

    /**
     * Display a listing of the Fuero.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fueros = $this->fueroRepository->all();

        return view('fueros.index')
            ->with('fueros', $fueros);
    }

    /**
     * Show the form for creating a new Fuero.
     *
     * @return Response
     */
    public function create()
    {
        return view('fueros.create');
    }

    /**
     * Store a newly created Fuero in storage.
     *
     * @param CreateFueroRequest $request
     *
     * @return Response
     */
    public function store(CreateFueroRequest $request)
    {
        $input = $request->all();

        $fuero = $this->fueroRepository->create($input);

        Flash::success('Fuero creado correctamente.');

        return redirect(route('fueros.index'));
    }

    /**
     * Display the specified Fuero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fuero = $this->fueroRepository->find($id);

        if (empty($fuero)) {
            Flash::error('Fuero no encontrado');

            return redirect(route('fueros.index'));
        }

        return view('fueros.show')->with('fuero', $fuero);
    }

    /**
     * Show the form for editing the specified Fuero.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fuero = $this->fueroRepository->find($id);

        if (empty($fuero)) {
            Flash::error('Fuero no encontrado');

            return redirect(route('fueros.index'));
        }

        return view('fueros.edit')->with('fuero', $fuero);
    }

    /**
     * Update the specified Fuero in storage.
     *
     * @param int $id
     * @param UpdateFueroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFueroRequest $request)
    {
        $fuero = $this->fueroRepository->find($id);

        if (empty($fuero)) {
            Flash::error('Fuero no encontrado');

            return redirect(route('fueros.index'));
        }

        $fuero = $this->fueroRepository->update($request->all(), $id);

        Flash::success('Fuero actualizado correctamente.');

        return redirect(route('fueros.index'));
    }

    /**
     * Remove the specified Fuero from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fuero = $this->fueroRepository->find($id);

        if (empty($fuero)) {
            Flash::error('Fuero no encontrado');

            return redirect(route('fueros.index'));
        }

        $this->fueroRepository->delete($id);

        Flash::success('Fuero eliminado correctamente.');

        return redirect(route('fueros.index'));
    }
}
