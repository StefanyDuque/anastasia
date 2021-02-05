<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetalle_servicioRequest;
use App\Http\Requests\Updatedetalle_servicioRequest;
use App\Repositories\detalle_servicioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class detalle_servicioController extends AppBaseController
{
    /** @var  detalle_servicioRepository */
    private $detalleServicioRepository;

    public function __construct(detalle_servicioRepository $detalleServicioRepo)
    {
        $this->detalleServicioRepository = $detalleServicioRepo;
    }

    /**
     * Display a listing of the detalle_servicio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detalleServicios = $this->detalleServicioRepository->all();

        return view('detalle_servicios.index')
            ->with('detalleServicios', $detalleServicios);
    }

    /**
     * Show the form for creating a new detalle_servicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('detalle_servicios.create');
    }

    /**
     * Store a newly created detalle_servicio in storage.
     *
     * @param Createdetalle_servicioRequest $request
     *
     * @return Response
     */
    public function store(Createdetalle_servicioRequest $request)
    {
        $input = $request->all();

        $detalleServicio = $this->detalleServicioRepository->create($input);

        Flash::success('Detalle Servicio saved successfully.');

        return redirect(route('detalleServicios.index'));
    }

    /**
     * Display the specified detalle_servicio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            Flash::error('Detalle Servicio not found');

            return redirect(route('detalleServicios.index'));
        }

        return view('detalle_servicios.show')->with('detalleServicio', $detalleServicio);
    }

    /**
     * Show the form for editing the specified detalle_servicio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            Flash::error('Detalle Servicio not found');

            return redirect(route('detalleServicios.index'));
        }

        return view('detalle_servicios.edit')->with('detalleServicio', $detalleServicio);
    }

    /**
     * Update the specified detalle_servicio in storage.
     *
     * @param int $id
     * @param Updatedetalle_servicioRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetalle_servicioRequest $request)
    {
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            Flash::error('Detalle Servicio not found');

            return redirect(route('detalleServicios.index'));
        }

        $detalleServicio = $this->detalleServicioRepository->update($request->all(), $id);

        Flash::success('Detalle Servicio updated successfully.');

        return redirect(route('detalleServicios.index'));
    }

    /**
     * Remove the specified detalle_servicio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            Flash::error('Detalle Servicio not found');

            return redirect(route('detalleServicios.index'));
        }

        $this->detalleServicioRepository->delete($id);

        Flash::success('Detalle Servicio deleted successfully.');

        return redirect(route('detalleServicios.index'));
    }
}
