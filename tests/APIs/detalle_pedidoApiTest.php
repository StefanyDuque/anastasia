<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\detalle_pedido;

class detalle_pedidoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/detalle_pedidos', $detallePedido
        );

        $this->assertApiResponse($detallePedido);
    }

    /**
     * @test
     */
    public function test_read_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/detalle_pedidos/'.$detallePedido->id
        );

        $this->assertApiResponse($detallePedido->toArray());
    }

    /**
     * @test
     */
    public function test_update_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->create();
        $editeddetalle_pedido = factory(detalle_pedido::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/detalle_pedidos/'.$detallePedido->id,
            $editeddetalle_pedido
        );

        $this->assertApiResponse($editeddetalle_pedido);
    }

    /**
     * @test
     */
    public function test_delete_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/detalle_pedidos/'.$detallePedido->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/detalle_pedidos/'.$detallePedido->id
        );

        $this->response->assertStatus(404);
    }
}
