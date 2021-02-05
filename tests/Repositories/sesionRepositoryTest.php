<?php namespace Tests\Repositories;

use App\Models\sesion;
use App\Repositories\sesionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class sesionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var sesionRepository
     */
    protected $sesionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sesionRepo = \App::make(sesionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sesion()
    {
        $sesion = factory(sesion::class)->make()->toArray();

        $createdsesion = $this->sesionRepo->create($sesion);

        $createdsesion = $createdsesion->toArray();
        $this->assertArrayHasKey('id', $createdsesion);
        $this->assertNotNull($createdsesion['id'], 'Created sesion must have id specified');
        $this->assertNotNull(sesion::find($createdsesion['id']), 'sesion with given id must be in DB');
        $this->assertModelData($sesion, $createdsesion);
    }

    /**
     * @test read
     */
    public function test_read_sesion()
    {
        $sesion = factory(sesion::class)->create();

        $dbsesion = $this->sesionRepo->find($sesion->id);

        $dbsesion = $dbsesion->toArray();
        $this->assertModelData($sesion->toArray(), $dbsesion);
    }

    /**
     * @test update
     */
    public function test_update_sesion()
    {
        $sesion = factory(sesion::class)->create();
        $fakesesion = factory(sesion::class)->make()->toArray();

        $updatedsesion = $this->sesionRepo->update($fakesesion, $sesion->id);

        $this->assertModelData($fakesesion, $updatedsesion->toArray());
        $dbsesion = $this->sesionRepo->find($sesion->id);
        $this->assertModelData($fakesesion, $dbsesion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sesion()
    {
        $sesion = factory(sesion::class)->create();

        $resp = $this->sesionRepo->delete($sesion->id);

        $this->assertTrue($resp);
        $this->assertNull(sesion::find($sesion->id), 'sesion should not exist in DB');
    }
}
