<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class pedidoResource extends JsonResource
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
            'id_pedido' => $this->id_pedido,
            'fecha' => $this->fecha,
            'direccion' => $this->direccion,
            'fecha_envio' => $this->fecha_envio,
            'comprador' => $this->comprador,
            'estatus' => $this->estatus,
            'items' => $this->items,
            'total' => $this->total
        ];
    }
}
