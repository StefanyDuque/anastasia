<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateusuarioAPIRequest;
use App\Http\Requests\API\UpdateusuarioAPIRequest;
use App\Models\usuario;
use App\Repositories\usuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;
use Response;

/**
 * Class usuarioController
 * @package App\Http\Controllers\API
 */
class usuarioAPIController extends AppBaseController
{
    /** @var  usuarioRepository */
    private $usuarioRepository;

    public function __construct(usuarioRepository $usuarioRepo)
    {
        $this->usuarioRepository = $usuarioRepo;
    }

    /**
     * Display a listing of the usuario.
     * GET|HEAD /usuarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($usuarios->toArray(), 'Usuarios retrieved successfully');
    }

    /**
     * Store a newly created usuario in storage.
     * POST /usuarios
     *
     * @param CreateusuarioAPIRequest $request
     *
     * @return Response
     */

    public function store(CreateusuarioAPIRequest $request)
    {
        $input = $request->all();
        //TODO: error_log(json_encode($input));
        $input["rol"] = $this->loadRol($input["rol"]);
        $input["fecha_nacimiento"] = $this->loadFechaNacimiento($input);
        $input['password'] = Hash::make($input['password']);
        $usuario = $this->usuarioRepository->create($input);

        return $this->sendResponse($usuario->toArray(), 'Usuario saved successfully');
    }

    /**
     * Display the specified usuario.
     * GET|HEAD /usuarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var usuario $usuario */
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        return $this->sendResponse($usuario->toArray(), 'Usuario retrieved successfully');
    }

    /**
     * Update the specified usuario in storage.
     * PUT/PATCH /usuarios/{id}
     *
     * @param int $id
     * @param UpdateusuarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var usuario $usuario */
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        $usuario = $this->usuarioRepository->update($input, $id);

        return $this->sendResponse($usuario->toArray(), 'usuario updated successfully');
    }

    /**
     * Remove the specified usuario from storage.
     * DELETE /usuarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var usuario $usuario */
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        $usuario->delete();

        return $this->sendSuccess('Usuario deleted successfully');
    }

    /**
     * @param $rol
     * @return mixed
     */
    public function loadRol($rol)
    {
        /** El array empieza desde la posícion 0 */
        $roles = array(
            false,
            "administrador",
            "cliente",
            "coordinador",
            "profesional",
            "operario",
            "vendedor",
            "proveedor",
        );
        //sometemos la conversion a try/catch por si el dato no llega de forma correcta
        try {
            //TODO: Por ahora manejaremos un rol por persona
            $rol_decode = json_decode($rol, TRUE);
            $rol_keys = array_keys($rol_decode);
            $rol_keys_encode = json_encode($rol_keys);
            if (sizeof($rol_keys) == 1) $rol_keys_encode = $rol_keys[0];
            $rol = array_search($rol_keys_encode, $roles);
        } catch (Exception $e) {
            error_log('Dato Rol Corrupto: ' . json_encode($rol));
        }
        return $rol;
        //TODO: error_log(json_encode($input["rol"])." - ".json_encode($rol_decode)." - ".$rol_keys_encode);
    }

    /**
     * @param $input
     * @return false|string
     */
    public function loadFechaNacimiento($input)
    {
        $time = strtotime('1900-01-01');
        $date = date('Y-m-d', $time);
        try{
            if (isset($input['fechaNacimiento']))
                $date = date('Y-m-d', $time = strtotime($input['fechaNacimiento']));
        }catch (Exception $e) {
            error_log('Dato FechaNacimiento Corrupto: ' . json_encode($input));
        }
        return $date;

    }
}
