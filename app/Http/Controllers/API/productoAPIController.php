<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproductoAPIRequest;
use App\Http\Requests\API\UpdateproductoAPIRequest;
use App\Models\producto;
use App\Repositories\productoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class productoController
 * @package App\Http\Controllers\API
 */

class productoAPIController extends AppBaseController
{
    /** @var  productoRepository */
    private $productoRepository;

    public function __construct(productoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the producto.
     * GET|HEAD /productos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $productos = $this->productoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($productos->toArray(), 'Productos retrieved successfully');
    }

    /**
     * Store a newly created producto in storage.
     * POST /productos
     *
     * @param CreateproductoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateproductoAPIRequest $request)
    {
        $input = $request->all();

        $producto = $this->productoRepository->create($input);

        return $this->sendResponse($producto->toArray(), 'Producto saved successfully');
    }

    /**
     * Display the specified producto.
     * GET|HEAD /productos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var producto $producto */
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        return $this->sendResponse($producto->toArray(), 'Producto retrieved successfully');
    }

    /**
     * Update the specified producto in storage.
     * PUT/PATCH /productos/{id}
     *
     * @param int $id
     * @param UpdateproductoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductoAPIRequest $request)
    {
        $input = $request->all();

        /** @var producto $producto */
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        $producto = $this->productoRepository->update($input, $id);

        return $this->sendResponse($producto->toArray(), 'producto updated successfully');
    }

    /**
     * Remove the specified producto from storage.
     * DELETE /productos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var producto $producto */
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        $producto->delete();

        return $this->sendSuccess('Producto deleted successfully');
    }
}
