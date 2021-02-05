<?php namespace Tests\Repositories;

use App\Models\producto;
use App\Repositories\productoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class productoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var productoRepository
     */
    protected $productoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productoRepo = \App::make(productoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_producto()
    {
        $producto = factory(producto::class)->make()->toArray();

        $createdproducto = $this->productoRepo->create($producto);

        $createdproducto = $createdproducto->toArray();
        $this->assertArrayHasKey('id', $createdproducto);
        $this->assertNotNull($createdproducto['id'], 'Created producto must have id specified');
        $this->assertNotNull(producto::find($createdproducto['id']), 'producto with given id must be in DB');
        $this->assertModelData($producto, $createdproducto);
    }

    /**
     * @test read
     */
    public function test_read_producto()
    {
        $producto = factory(producto::class)->create();

        $dbproducto = $this->productoRepo->find($producto->id);

        $dbproducto = $dbproducto->toArray();
        $this->assertModelData($producto->toArray(), $dbproducto);
    }

    /**
     * @test update
     */
    public function test_update_producto()
    {
        $producto = factory(producto::class)->create();
        $fakeproducto = factory(producto::class)->make()->toArray();

        $updatedproducto = $this->productoRepo->update($fakeproducto, $producto->id);

        $this->assertModelData($fakeproducto, $updatedproducto->toArray());
        $dbproducto = $this->productoRepo->find($producto->id);
        $this->assertModelData($fakeproducto, $dbproducto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_producto()
    {
        $producto = factory(producto::class)->create();

        $resp = $this->productoRepo->delete($producto->id);

        $this->assertTrue($resp);
        $this->assertNull(producto::find($producto->id), 'producto should not exist in DB');
    }
}
