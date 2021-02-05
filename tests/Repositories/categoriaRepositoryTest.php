<?php namespace Tests\Repositories;

use App\Models\categoria;
use App\Repositories\categoriaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class categoriaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var categoriaRepository
     */
    protected $categoriaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoriaRepo = \App::make(categoriaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_categoria()
    {
        $categoria = factory(categoria::class)->make()->toArray();

        $createdcategoria = $this->categoriaRepo->create($categoria);

        $createdcategoria = $createdcategoria->toArray();
        $this->assertArrayHasKey('id', $createdcategoria);
        $this->assertNotNull($createdcategoria['id'], 'Created categoria must have id specified');
        $this->assertNotNull(categoria::find($createdcategoria['id']), 'categoria with given id must be in DB');
        $this->assertModelData($categoria, $createdcategoria);
    }

    /**
     * @test read
     */
    public function test_read_categoria()
    {
        $categoria = factory(categoria::class)->create();

        $dbcategoria = $this->categoriaRepo->find($categoria->id);

        $dbcategoria = $dbcategoria->toArray();
        $this->assertModelData($categoria->toArray(), $dbcategoria);
    }

    /**
     * @test update
     */
    public function test_update_categoria()
    {
        $categoria = factory(categoria::class)->create();
        $fakecategoria = factory(categoria::class)->make()->toArray();

        $updatedcategoria = $this->categoriaRepo->update($fakecategoria, $categoria->id);

        $this->assertModelData($fakecategoria, $updatedcategoria->toArray());
        $dbcategoria = $this->categoriaRepo->find($categoria->id);
        $this->assertModelData($fakecategoria, $dbcategoria->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_categoria()
    {
        $categoria = factory(categoria::class)->create();

        $resp = $this->categoriaRepo->delete($categoria->id);

        $this->assertTrue($resp);
        $this->assertNull(categoria::find($categoria->id), 'categoria should not exist in DB');
    }
}
