<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdetalle_servicioAPIRequest;
use App\Http\Requests\API\Updatedetalle_servicioAPIRequest;
use App\Models\detalle_servicio;
use App\Repositories\detalle_servicioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class detalle_servicioController
 * @package App\Http\Controllers\API
 */

class detalle_servicioAPIController extends AppBaseController
{
    /** @var  detalle_servicioRepository */
    private $detalleServicioRepository;

    public function __construct(detalle_servicioRepository $detalleServicioRepo)
    {
        $this->detalleServicioRepository = $detalleServicioRepo;
    }

    /**
     * Display a listing of the detalle_servicio.
     * GET|HEAD /detalleServicios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $detalleServicios = $this->detalleServicioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($detalleServicios->toArray(), 'Detalle Servicios retrieved successfully');
    }

    /**
     * Store a newly created detalle_servicio in storage.
     * POST /detalleServicios
     *
     * @param Createdetalle_servicioAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdetalle_servicioAPIRequest $request)
    {
        $input = $request->all();

        $detalleServicio = $this->detalleServicioRepository->create($input);

        return $this->sendResponse($detalleServicio->toArray(), 'Detalle Servicio saved successfully');
    }

    /**
     * Display the specified detalle_servicio.
     * GET|HEAD /detalleServicios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var detalle_servicio $detalleServicio */
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            return $this->sendError('Detalle Servicio not found');
        }

        return $this->sendResponse($detalleServicio->toArray(), 'Detalle Servicio retrieved successfully');
    }

    /**
     * Update the specified detalle_servicio in storage.
     * PUT/PATCH /detalleServicios/{id}
     *
     * @param int $id
     * @param Updatedetalle_servicioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetalle_servicioAPIRequest $request)
    {
        $input = $request->all();

        /** @var detalle_servicio $detalleServicio */
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            return $this->sendError('Detalle Servicio not found');
        }

        $detalleServicio = $this->detalleServicioRepository->update($input, $id);

        return $this->sendResponse($detalleServicio->toArray(), 'detalle_servicio updated successfully');
    }

    /**
     * Remove the specified detalle_servicio from storage.
     * DELETE /detalleServicios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var detalle_servicio $detalleServicio */
        $detalleServicio = $this->detalleServicioRepository->find($id);

        if (empty($detalleServicio)) {
            return $this->sendError('Detalle Servicio not found');
        }

        $detalleServicio->delete();

        return $this->sendSuccess('Detalle Servicio deleted successfully');
    }
}
