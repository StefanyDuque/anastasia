<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepedidoAPIRequest;
use App\Http\Requests\API\UpdatepedidoAPIRequest;
use App\Models\pedido;
use App\Repositories\pedidoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class pedidoController
 * @package App\Http\Controllers\API
 */

class pedidoAPIController extends AppBaseController
{
    /** @var  pedidoRepository */
    private $pedidoRepository;

    public function __construct(pedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * Display a listing of the pedido.
     * GET|HEAD /pedidos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedidoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pedidos->toArray(), 'Pedidos retrieved successfully');
    }

    /**
     * Store a newly created pedido in storage.
     * POST /pedidos
     *
     * @param CreatepedidoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepedidoAPIRequest $request)
    {
        $input = $request->all();

        $pedido = $this->pedidoRepository->create($input);

        return $this->sendResponse($pedido->toArray(), 'Pedido saved successfully');
    }

    /**
     * Display the specified pedido.
     * GET|HEAD /pedidos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var pedido $pedido */
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            return $this->sendError('Pedido not found');
        }

        return $this->sendResponse($pedido->toArray(), 'Pedido retrieved successfully');
    }

    /**
     * Update the specified pedido in storage.
     * PUT/PATCH /pedidos/{id}
     *
     * @param int $id
     * @param UpdatepedidoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepedidoAPIRequest $request)
    {
        $input = $request->all();

        /** @var pedido $pedido */
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            return $this->sendError('Pedido not found');
        }

        $pedido = $this->pedidoRepository->update($input, $id);

        return $this->sendResponse($pedido->toArray(), 'pedido updated successfully');
    }

    /**
     * Remove the specified pedido from storage.
     * DELETE /pedidos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var pedido $pedido */
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            return $this->sendError('Pedido not found');
        }

        $pedido->delete();

        return $this->sendSuccess('Pedido deleted successfully');
    }
}
