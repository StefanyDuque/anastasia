<?php namespace Tests\Repositories;

use App\Models\detalle_pedido;
use App\Repositories\detalle_pedidoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class detalle_pedidoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var detalle_pedidoRepository
     */
    protected $detallePedidoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->detallePedidoRepo = \App::make(detalle_pedidoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->make()->toArray();

        $createddetalle_pedido = $this->detallePedidoRepo->create($detallePedido);

        $createddetalle_pedido = $createddetalle_pedido->toArray();
        $this->assertArrayHasKey('id', $createddetalle_pedido);
        $this->assertNotNull($createddetalle_pedido['id'], 'Created detalle_pedido must have id specified');
        $this->assertNotNull(detalle_pedido::find($createddetalle_pedido['id']), 'detalle_pedido with given id must be in DB');
        $this->assertModelData($detallePedido, $createddetalle_pedido);
    }

    /**
     * @test read
     */
    public function test_read_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->create();

        $dbdetalle_pedido = $this->detallePedidoRepo->find($detallePedido->id);

        $dbdetalle_pedido = $dbdetalle_pedido->toArray();
        $this->assertModelData($detallePedido->toArray(), $dbdetalle_pedido);
    }

    /**
     * @test update
     */
    public function test_update_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->create();
        $fakedetalle_pedido = factory(detalle_pedido::class)->make()->toArray();

        $updateddetalle_pedido = $this->detallePedidoRepo->update($fakedetalle_pedido, $detallePedido->id);

        $this->assertModelData($fakedetalle_pedido, $updateddetalle_pedido->toArray());
        $dbdetalle_pedido = $this->detallePedidoRepo->find($detallePedido->id);
        $this->assertModelData($fakedetalle_pedido, $dbdetalle_pedido->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_detalle_pedido()
    {
        $detallePedido = factory(detalle_pedido::class)->create();

        $resp = $this->detallePedidoRepo->delete($detallePedido->id);

        $this->assertTrue($resp);
        $this->assertNull(detalle_pedido::find($detallePedido->id), 'detalle_pedido should not exist in DB');
    }
}
