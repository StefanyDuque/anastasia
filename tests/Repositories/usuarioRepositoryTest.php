<?php namespace Tests\Repositories;

use App\Models\usuario;
use App\Repositories\usuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class usuarioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var usuarioRepository
     */
    protected $usuarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->usuarioRepo = \App::make(usuarioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_usuario()
    {
        $usuario = factory(usuario::class)->make()->toArray();

        $createdusuario = $this->usuarioRepo->create($usuario);

        $createdusuario = $createdusuario->toArray();
        $this->assertArrayHasKey('id', $createdusuario);
        $this->assertNotNull($createdusuario['id'], 'Created usuario must have id specified');
        $this->assertNotNull(usuario::find($createdusuario['id']), 'usuario with given id must be in DB');
        $this->assertModelData($usuario, $createdusuario);
    }

    /**
     * @test read
     */
    public function test_read_usuario()
    {
        $usuario = factory(usuario::class)->create();

        $dbusuario = $this->usuarioRepo->find($usuario->id);

        $dbusuario = $dbusuario->toArray();
        $this->assertModelData($usuario->toArray(), $dbusuario);
    }

    /**
     * @test update
     */
    public function test_update_usuario()
    {
        $usuario = factory(usuario::class)->create();
        $fakeusuario = factory(usuario::class)->make()->toArray();

        $updatedusuario = $this->usuarioRepo->update($fakeusuario, $usuario->id);

        $this->assertModelData($fakeusuario, $updatedusuario->toArray());
        $dbusuario = $this->usuarioRepo->find($usuario->id);
        $this->assertModelData($fakeusuario, $dbusuario->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_usuario()
    {
        $usuario = factory(usuario::class)->create();

        $resp = $this->usuarioRepo->delete($usuario->id);

        $this->assertTrue($resp);
        $this->assertNull(usuario::find($usuario->id), 'usuario should not exist in DB');
    }
}
