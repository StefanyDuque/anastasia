<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class detalle_pedidoResource extends JsonResource
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
            'id_detalle_pedido' => $this->id_detalle_pedido,
            'id_pedido' => $this->id_pedido,
            'codigo_producto' => $this->codigo_producto,
            'cantidad' => $this->cantidad,
            'fecha' => $this->fecha,
            'vendedor' => $this->vendedor,
            'descuento' => $this->descuento,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
