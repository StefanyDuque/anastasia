<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\pedido;

class pedidoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pedido()
    {
        $pedido = factory(pedido::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pedidos', $pedido
        );

        $this->assertApiResponse($pedido);
    }

    /**
     * @test
     */
    public function test_read_pedido()
    {
        $pedido = factory(pedido::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/pedidos/'.$pedido->id
        );

        $this->assertApiResponse($pedido->toArray());
    }

    /**
     * @test
     */
    public function test_update_pedido()
    {
        $pedido = factory(pedido::class)->create();
        $editedpedido = factory(pedido::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pedidos/'.$pedido->id,
            $editedpedido
        );

        $this->assertApiResponse($editedpedido);
    }

    /**
     * @test
     */
    public function test_delete_pedido()
    {
        $pedido = factory(pedido::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pedidos/'.$pedido->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pedidos/'.$pedido->id
        );

        $this->response->assertStatus(404);
    }
}
