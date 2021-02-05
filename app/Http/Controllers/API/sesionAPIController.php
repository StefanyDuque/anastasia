<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesesionAPIRequest;
use App\Http\Requests\API\UpdatesesionAPIRequest;
use App\Models\sesion;
use App\Repositories\sesionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class sesionController
 * @package App\Http\Controllers\API
 */

class sesionAPIController extends AppBaseController
{
    /** @var  sesionRepository */
    private $sesionRepository;

    public function __construct(sesionRepository $sesionRepo)
    {
        $this->sesionRepository = $sesionRepo;
    }

    /**
     * Display a listing of the sesion.
     * GET|HEAD /sesions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sesions = $this->sesionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sesions->toArray(), 'Sesions retrieved successfully');
    }

    /**
     * Store a newly created sesion in storage.
     * POST /sesions
     *
     * @param CreatesesionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesesionAPIRequest $request)
    {
        $input = $request->all();

        $sesion = $this->sesionRepository->create($input);

        return $this->sendResponse($sesion->toArray(), 'Sesion saved successfully');
    }

    /**
     * Display the specified sesion.
     * GET|HEAD /sesions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var sesion $sesion */
        $sesion = $this->sesionRepository->find($id);

        if (empty($sesion)) {
            return $this->sendError('Sesion not found');
        }

        return $this->sendResponse($sesion->toArray(), 'Sesion retrieved successfully');
    }

    /**
     * Update the specified sesion in storage.
     * PUT/PATCH /sesions/{id}
     *
     * @param int $id
     * @param UpdatesesionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesesionAPIRequest $request)
    {
        $input = $request->all();

        /** @var sesion $sesion */
        $sesion = $this->sesionRepository->find($id);

        if (empty($sesion)) {
            return $this->sendError('Sesion not found');
        }

        $sesion = $this->sesionRepository->update($input, $id);

        return $this->sendResponse($sesion->toArray(), 'sesion updated successfully');
    }

    /**
     * Remove the specified sesion from storage.
     * DELETE /sesions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var sesion $sesion */
        $sesion = $this->sesionRepository->find($id);

        if (empty($sesion)) {
            return $this->sendError('Sesion not found');
        }

        $sesion->delete();

        return $this->sendSuccess('Sesion deleted successfully');
    }
}
