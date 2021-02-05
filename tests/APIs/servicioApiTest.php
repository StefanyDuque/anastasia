<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\servicio;

class servicioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_servicio()
    {
        $servicio = factory(servicio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/servicios', $servicio
        );

        $this->assertApiResponse($servicio);
    }

    /**
     * @test
     */
    public function test_read_servicio()
    {
        $servicio = factory(servicio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/servicios/'.$servicio->id
        );

        $this->assertApiResponse($servicio->toArray());
    }

    /**
     * @test
     */
    public function test_update_servicio()
    {
        $servicio = factory(servicio::class)->create();
        $editedservicio = factory(servicio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/servicios/'.$servicio->id,
            $editedservicio
        );

        $this->assertApiResponse($editedservicio);
    }

    /**
     * @test
     */
    public function test_delete_servicio()
    {
        $servicio = factory(servicio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/servicios/'.$servicio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/servicios/'.$servicio->id
        );

        $this->response->assertStatus(404);
    }
}
