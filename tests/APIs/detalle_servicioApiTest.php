<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\detalle_servicio;

class detalle_servicioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/detalle_servicios', $detalleServicio
        );

        $this->assertApiResponse($detalleServicio);
    }

    /**
     * @test
     */
    public function test_read_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/detalle_servicios/'.$detalleServicio->id
        );

        $this->assertApiResponse($detalleServicio->toArray());
    }

    /**
     * @test
     */
    public function test_update_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->create();
        $editeddetalle_servicio = factory(detalle_servicio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/detalle_servicios/'.$detalleServicio->id,
            $editeddetalle_servicio
        );

        $this->assertApiResponse($editeddetalle_servicio);
    }

    /**
     * @test
     */
    public function test_delete_detalle_servicio()
    {
        $detalleServicio = factory(detalle_servicio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/detalle_servicios/'.$detalleServicio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/detalle_servicios/'.$detalleServicio->id
        );

        $this->response->assertStatus(404);
    }
}
