<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecategoriaAPIRequest;
use App\Http\Requests\API\UpdatecategoriaAPIRequest;
use App\Models\categoria;
use App\Repositories\categoriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class categoriaController
 * @package App\Http\Controllers\API
 */

class categoriaAPIController extends AppBaseController
{
    /** @var  categoriaRepository */
    private $categoriaRepository;

    public function __construct(categoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * Display a listing of the categoria.
     * GET|HEAD /categorias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $categorias = $this->categoriaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($categorias->toArray(), 'Categorias retrieved successfully');
    }

    /**
     * Store a newly created categoria in storage.
     * POST /categorias
     *
     * @param CreatecategoriaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriaAPIRequest $request)
    {
        $input = $request->all();

        $categoria = $this->categoriaRepository->create($input);

        return $this->sendResponse($categoria->toArray(), 'Categoria saved successfully');
    }

    /**
     * Display the specified categoria.
     * GET|HEAD /categorias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var categoria $categoria */
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        return $this->sendResponse($categoria->toArray(), 'Categoria retrieved successfully');
    }

    /**
     * Update the specified categoria in storage.
     * PUT/PATCH /categorias/{id}
     *
     * @param int $id
     * @param UpdatecategoriaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriaAPIRequest $request)
    {
        $input = $request->all();

        /** @var categoria $categoria */
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        $categoria = $this->categoriaRepository->update($input, $id);

        return $this->sendResponse($categoria->toArray(), 'categoria updated successfully');
    }

    /**
     * Remove the specified categoria from storage.
     * DELETE /categorias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var categoria $categoria */
        $categoria = $this->categoriaRepository->find($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        $categoria->delete();

        return $this->sendSuccess('Categoria deleted successfully');
    }
}
