<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeguimintoRequest;
use App\Http\Requests\UpdateSeguimintoRequest;
use App\Repositories\SeguimintoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Expediente;

class SeguimintoController extends AppBaseController
{
    /** @var SeguimintoRepository $seguimintoRepository*/
    private $seguimintoRepository;

    public function __construct(SeguimintoRepository $seguimintoRepo)
    {
        $this->seguimintoRepository = $seguimintoRepo;
    }

    /**
     * Display a listing of the Seguiminto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $seguimintos = $this->seguimintoRepository->all();

        return view('seguimintos.index')
            ->with('seguimintos', $seguimintos);
    }

    /**
     * Show the form for creating a new Seguiminto.
     *
     * @return Response
     */
    public function create()
    {
        $expediente=Expediente::pluck('numero','id');
        return view('seguimintos.create',compact('expediente'));
    }

    /**
     * Store a newly created Seguiminto in storage.
     *
     * @param CreateSeguimintoRequest $request
     *
     * @return Response
     */
    public function store(CreateSeguimintoRequest $request)
    {
        $input = $request->all();

        $seguiminto = $this->seguimintoRepository->create($input);

        Flash::success('Seguiminto saved successfully.');

        return redirect(route('seguimintos.index'));
    }

    /**
     * Display the specified Seguiminto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seguiminto = $this->seguimintoRepository->find($id);

        if (empty($seguiminto)) {
            Flash::error('Seguiminto not found');

            return redirect(route('seguimintos.index'));
        }

        return view('seguimintos.show')->with('seguiminto', $seguiminto);
    }

    /**
     * Show the form for editing the specified Seguiminto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seguiminto = $this->seguimintoRepository->find($id);

        if (empty($seguiminto)) {
            Flash::error('Seguiminto not found');

            return redirect(route('seguimintos.index'));
        }

        return view('seguimintos.edit')->with('seguiminto', $seguiminto);
    }

    /**
     * Update the specified Seguiminto in storage.
     *
     * @param int $id
     * @param UpdateSeguimintoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeguimintoRequest $request)
    {
        $seguiminto = $this->seguimintoRepository->find($id);

        if (empty($seguiminto)) {
            Flash::error('Seguiminto not found');

            return redirect(route('seguimintos.index'));
        }

        $seguiminto = $this->seguimintoRepository->update($request->all(), $id);

        Flash::success('Seguiminto updated successfully.');

        return redirect(route('seguimintos.index'));
    }

    /**
     * Remove the specified Seguiminto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $seguiminto = $this->seguimintoRepository->find($id);

        if (empty($seguiminto)) {
            Flash::error('Seguiminto not found');

            return redirect(route('seguimintos.index'));
        }

        $this->seguimintoRepository->delete($id);

        Flash::success('Seguiminto deleted successfully.');

         return redirect(route('expedientes.show',$request->id_expediente));

    }
}
