<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\usuario;

class usuarioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_usuario()
    {
        $usuario = factory(usuario::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/usuarios', $usuario
        );

        $this->assertApiResponse($usuario);
    }

    /**
     * @test
     */
    public function test_read_usuario()
    {
        $usuario = factory(usuario::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/usuarios/'.$usuario->id
        );

        $this->assertApiResponse($usuario->toArray());
    }

    /**
     * @test
     */
    public function test_update_usuario()
    {
        $usuario = factory(usuario::class)->create();
        $editedusuario = factory(usuario::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/usuarios/'.$usuario->id,
            $editedusuario
        );

        $this->assertApiResponse($editedusuario);
    }

    /**
     * @test
     */
    public function test_delete_usuario()
    {
        $usuario = factory(usuario::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/usuarios/'.$usuario->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/usuarios/'.$usuario->id
        );

        $this->response->assertStatus(404);
    }
}
