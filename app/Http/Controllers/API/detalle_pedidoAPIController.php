<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdetalle_pedidoAPIRequest;
use App\Http\Requests\API\Updatedetalle_pedidoAPIRequest;
use App\Models\detalle_pedido;
use App\Repositories\detalle_pedidoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class detalle_pedidoController
 * @package App\Http\Controllers\API
 */

class detalle_pedidoAPIController extends AppBaseController
{
    /** @var  detalle_pedidoRepository */
    private $detallePedidoRepository;

    public function __construct(detalle_pedidoRepository $detallePedidoRepo)
    {
        $this->detallePedidoRepository = $detallePedidoRepo;
    }

    /**
     * Display a listing of the detalle_pedido.
     * GET|HEAD /detallePedidos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $detallePedidos = $this->detallePedidoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($detallePedidos->toArray(), 'Detalle Pedidos retrieved successfully');
    }

    /**
     * Store a newly created detalle_pedido in storage.
     * POST /detallePedidos
     *
     * @param Createdetalle_pedidoAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdetalle_pedidoAPIRequest $request)
    {
        $input = $request->all();

        $detallePedido = $this->detallePedidoRepository->create($input);

        return $this->sendResponse($detallePedido->toArray(), 'Detalle Pedido saved successfully');
    }

    /**
     * Display the specified detalle_pedido.
     * GET|HEAD /detallePedidos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var detalle_pedido $detallePedido */
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            return $this->sendError('Detalle Pedido not found');
        }

        return $this->sendResponse($detallePedido->toArray(), 'Detalle Pedido retrieved successfully');
    }

    /**
     * Update the specified detalle_pedido in storage.
     * PUT/PATCH /detallePedidos/{id}
     *
     * @param int $id
     * @param Updatedetalle_pedidoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetalle_pedidoAPIRequest $request)
    {
        $input = $request->all();

        /** @var detalle_pedido $detallePedido */
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            return $this->sendError('Detalle Pedido not found');
        }

        $detallePedido = $this->detallePedidoRepository->update($input, $id);

        return $this->sendResponse($detallePedido->toArray(), 'detalle_pedido updated successfully');
    }

    /**
     * Remove the specified detalle_pedido from storage.
     * DELETE /detallePedidos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var detalle_pedido $detallePedido */
        $detallePedido = $this->detallePedidoRepository->find($id);

        if (empty($detallePedido)) {
            return $this->sendError('Detalle Pedido not found');
        }

        $detallePedido->delete();

        return $this->sendSuccess('Detalle Pedido deleted successfully');
    }
}
