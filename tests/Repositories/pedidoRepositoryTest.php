<?php namespace Tests\Repositories;

use App\Models\pedido;
use App\Repositories\pedidoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class pedidoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var pedidoRepository
     */
    protected $pedidoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pedidoRepo = \App::make(pedidoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pedido()
    {
        $pedido = factory(pedido::class)->make()->toArray();

        $createdpedido = $this->pedidoRepo->create($pedido);

        $createdpedido = $createdpedido->toArray();
        $this->assertArrayHasKey('id', $createdpedido);
        $this->assertNotNull($createdpedido['id'], 'Created pedido must have id specified');
        $this->assertNotNull(pedido::find($createdpedido['id']), 'pedido with given id must be in DB');
        $this->assertModelData($pedido, $createdpedido);
    }

    /**
     * @test read
     */
    public function test_read_pedido()
    {
        $pedido = factory(pedido::class)->create();

        $dbpedido = $this->pedidoRepo->find($pedido->id);

        $dbpedido = $dbpedido->toArray();
        $this->assertModelData($pedido->toArray(), $dbpedido);
    }

    /**
     * @test update
     */
    public function test_update_pedido()
    {
        $pedido = factory(pedido::class)->create();
        $fakepedido = factory(pedido::class)->make()->toArray();

        $updatedpedido = $this->pedidoRepo->update($fakepedido, $pedido->id);

        $this->assertModelData($fakepedido, $updatedpedido->toArray());
        $dbpedido = $this->pedidoRepo->find($pedido->id);
        $this->assertModelData($fakepedido, $dbpedido->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pedido()
    {
        $pedido = factory(pedido::class)->create();

        $resp = $this->pedidoRepo->delete($pedido->id);

        $this->assertTrue($resp);
        $this->assertNull(pedido::find($pedido->id), 'pedido should not exist in DB');
    }
}
