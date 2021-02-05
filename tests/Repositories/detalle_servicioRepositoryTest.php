<?php namespace Tests\Repositories;

use App\Models\detalle_servicio;
use App\Repositories\detalle_servicioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class detalle_servicioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var detalle_servicioRepository
     */
    protected $detalleServicioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->detalleServicioRepo = \App::make(detalle_servicioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->make()->toArray();

        $createddetalle_servicio = $this->detalleServicioRepo->create($detalleServicio);

        $createddetalle_servicio = $createddetalle_servicio->toArray();
        $this->assertArrayHasKey('id', $createddetalle_servicio);
        $this->assertNotNull($createddetalle_servicio['id'], 'Created detalle_servicio must have id specified');
        $this->assertNotNull(detalle_servicio::find($createddetalle_servicio['id']), 'detalle_servicio with given id must be in DB');
        $this->assertModelData($detalleServicio, $createddetalle_servicio);
    }

    /**
     * @test read
     */
    public function test_read_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->create();

        $dbdetalle_servicio = $this->detalleServicioRepo->find($detalleServicio->id);

        $dbdetalle_servicio = $dbdetalle_servicio->toArray();
        $this->assertModelData($detalleServicio->toArray(), $dbdetalle_servicio);
    }

    /**
     * @test update
     */
    public function test_update_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->create();
        $fakedetalle_servicio = factory(detalle_servicio::class)->make()->toArray();

        $updateddetalle_servicio = $this->detalleServicioRepo->update($fakedetalle_servicio, $detalleServicio->id);

        $this->assertModelData($fakedetalle_servicio, $updateddetalle_servicio->toArray());
        $dbdetalle_servicio = $this->detalleServicioRepo->find($detalleServicio->id);
        $this->assertModelData($fakedetalle_servicio, $dbdetalle_servicio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->create();

        $resp = $this->detalleServicioRepo->delete($detalleServicio->id);

        $this->assertTrue($resp);
        $this->assertNull(detalle_servicio::find($detalleServicio->id), 'detalle_servicio should not exist in DB');
    }
}
