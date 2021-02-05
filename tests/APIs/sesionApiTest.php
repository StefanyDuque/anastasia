<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\sesion;

class sesionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sesion()
    {
        $sesion = factory(sesion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sesions', $sesion
        );

        $this->assertApiResponse($sesion);
    }

    /**
     * @test
     */
    public function test_read_sesion()
    {
        $sesion = factory(sesion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sesions/'.$sesion->id
        );

        $this->assertApiResponse($sesion->toArray());
    }

    /**
     * @test
     */
    public function test_update_sesion()
    {
        $sesion = factory(sesion::class)->create();
        $editedsesion = factory(sesion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sesions/'.$sesion->id,
            $editedsesion
        );

        $this->assertApiResponse($editedsesion);
    }

    /**
     * @test
     */
    public function test_delete_sesion()
    {
        $sesion = factory(sesion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sesions/'.$sesion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sesions/'.$sesion->id
        );

        $this->response->assertStatus(404);
    }
}
