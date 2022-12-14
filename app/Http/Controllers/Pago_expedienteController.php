<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePago_expedienteRequest;
use App\Http\Requests\UpdatePago_expedienteRequest;
use App\Repositories\Pago_expedienteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Expediente; 
class Pago_expedienteController extends AppBaseController
{
    /** @var Pago_expedienteRepository $pagoExpedienteRepository*/
    private $pagoExpedienteRepository;

    public function __construct(Pago_expedienteRepository $pagoExpedienteRepo)
    {
        $this->pagoExpedienteRepository = $pagoExpedienteRepo;
    }

    /**
     * Display a listing of the Pago_expediente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pagoExpedientes = $this->pagoExpedienteRepository->all();

        return view('pago_expedientes.index')
            ->with('pagoExpedientes', $pagoExpedientes);
    }

    /**
     * Show the form for creating a new Pago_expediente.
     *
     * @return Response
     */
    public function create()
    {
        $expediente = Expediente::pluck('numero','id');
          return view('pago_expedientes.create',compact('expediente'));
    }

    /**
     * Store a newly created Pago_expediente in storage.
     *
     * @param CreatePago_expedienteRequest $request
     *
     * @return Response
     */
    public function store(CreatePago_expedienteRequest $request)
    {

       $input = $request->all();
        if($request->hasFile('archivo')){
            $input['archivo']=$request->file('archivo')->store('uploads','public');   
        }

        $pagoExpediente = $this->pagoExpedienteRepository->create($input);

        Flash::success('Pago Expediente saved successfully.');
    }

    /**
     * Display the specified Pago_expediente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pagoExpediente = $this->pagoExpedienteRepository->find($id);

        if (empty($pagoExpediente)) {
            Flash::error('Pago Expediente not found');

            return redirect(route('pagoExpedientes.index'));
        }

        return view('pago_expedientes.show')->with('pagoExpediente', $pagoExpediente);
    }

   public function archivo(Request $request)
    {
        $pagoExpediente = $this->pagoExpedienteRepository->find($request->id);

        return response()->json(['archivo' => $pagoExpediente->archivo], 201);        
    }
    /**
     * Show the form for editing the specified Pago_expediente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pagoExpediente = $this->pagoExpedienteRepository->find($id);
        $expediente = Expediente::pluck('numero','id');

        if (empty($pagoExpediente)) {
            Flash::error('Pago Expediente not found');

            return redirect(route('pagoExpedientes.index'));
        }

        return view('pago_expedientes.edit',compact('expediente','pagoExpediente'));
    }

    /**
     * Update the specified Pago_expediente in storage.
     *
     * @param int $id
     * @param UpdatePago_expedienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePago_expedienteRequest $request)
    {
        $pagoExpediente = $this->pagoExpedienteRepository->find($id);

        if (empty($pagoExpediente)) {
            Flash::error('Pago Expediente not found');

            return redirect(route('pagoExpedientes.index'));
        }

        $pagoExpediente = $this->pagoExpedienteRepository->update($request->all(), $id);

        Flash::success('Pago Expediente updated successfully.');

        return redirect(route('pagoExpedientes.index'));
    }

    /**
     * Remove the specified Pago_expediente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $pagoExpediente = $this->pagoExpedienteRepository->find($id);

        if (empty($pagoExpediente)) {
            Flash::error('Pago Expediente not found');

            return redirect(route('pagoExpedientes.index'));
        }

        $this->pagoExpedienteRepository->delete($id);

        

        return redirect(route('expedientes.show',$request->id_expediente));
    }
}
