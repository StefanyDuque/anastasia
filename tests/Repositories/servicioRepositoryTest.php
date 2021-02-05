<?php namespace Tests\Repositories;

use App\Models\servicio;
use App\Repositories\servicioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class servicioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var servicioRepository
     */
    protected $servicioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->servicioRepo = \App::make(servicioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_servicio()
    {
        $servicio = factory(servicio::class)->make()->toArray();

        $createdservicio = $this->servicioRepo->create($servicio);

        $createdservicio = $createdservicio->toArray();
        $this->assertArrayHasKey('id', $createdservicio);
        $this->assertNotNull($createdservicio['id'], 'Created servicio must have id specified');
        $this->assertNotNull(servicio::find($createdservicio['id']), 'servicio with given id must be in DB');
        $this->assertModelData($servicio, $createdservicio);
    }

    /**
     * @test read
     */
    public function test_read_servicio()
    {
        $servicio = factory(servicio::class)->create();

        $dbservicio = $this->servicioRepo->find($servicio->id);

        $dbservicio = $dbservicio->toArray();
        $this->assertModelData($servicio->toArray(), $dbservicio);
    }

    /**
     * @test update
     */
    public function test_update_servicio()
    {
        $servicio = factory(servicio::class)->create();
        $fakeservicio = factory(servicio::class)->make()->toArray();

        $updatedservicio = $this->servicioRepo->update($fakeservicio, $servicio->id);

        $this->assertModelData($fakeservicio, $updatedservicio->toArray());
        $dbservicio = $this->servicioRepo->find($servicio->id);
        $this->assertModelData($fakeservicio, $dbservicio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_servicio()
    {
        $servicio = factory(servicio::class)->create();

        $resp = $this->servicioRepo->delete($servicio->id);

        $this->assertTrue($resp);
        $this->assertNull(servicio::find($servicio->id), 'servicio should not exist in DB');
    }
}
