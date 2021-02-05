<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class detalle_servicioResource extends JsonResource
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
            'id_detalle_servicio' => $this->id_detalle_servicio,
            'id_servicio' => $this->id_servicio,
            'inicio' => $this->inicio,
            'fin' => $this->fin,
            'asesor' => $this->asesor,
            'cliente' => $this->cliente,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
