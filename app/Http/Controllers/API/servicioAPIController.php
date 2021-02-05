<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateservicioAPIRequest;
use App\Http\Requests\API\UpdateservicioAPIRequest;
use App\Models\servicio;
use App\Repositories\servicioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class servicioController
 * @package App\Http\Controllers\API
 */

class servicioAPIController extends AppBaseController
{
    /** @var  servicioRepository */
    private $servicioRepository;

    public function __construct(servicioRepository $servicioRepo)
    {
        $this->servicioRepository = $servicioRepo;
    }

    /**
     * Display a listing of the servicio.
     * GET|HEAD /servicios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $servicios = $this->servicioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($servicios->toArray(), 'Servicios retrieved successfully');
    }

    /**
     * Store a newly created servicio in storage.
     * POST /servicios
     *
     * @param CreateservicioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateservicioAPIRequest $request)
    {
        $input = $request->all();

        $servicio = $this->servicioRepository->create($input);

        return $this->sendResponse($servicio->toArray(), 'Servicio saved successfully');
    }

    /**
     * Display the specified servicio.
     * GET|HEAD /servicios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var servicio $servicio */
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio not found');
        }

        return $this->sendResponse($servicio->toArray(), 'Servicio retrieved successfully');
    }

    /**
     * Update the specified servicio in storage.
     * PUT/PATCH /servicios/{id}
     *
     * @param int $id
     * @param UpdateservicioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateservicioAPIRequest $request)
    {
        $input = $request->all();

        /** @var servicio $servicio */
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio not found');
        }

        $servicio = $this->servicioRepository->update($input, $id);

        return $this->sendResponse($servicio->toArray(), 'servicio updated successfully');
    }

    /**
     * Remove the specified servicio from storage.
     * DELETE /servicios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var servicio $servicio */
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio not found');
        }

        $servicio->delete();

        return $this->sendSuccess('Servicio deleted successfully');
    }
}
