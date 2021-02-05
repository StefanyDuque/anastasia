<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class usuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_usuario' => $this->id_usuario,
            'username' => $this->username,
            'password' => $this->password,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'identificacion' => $this->identificacion,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'estatus' => $this->estatus,
            'rol' => $this->rol,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
