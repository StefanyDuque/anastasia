<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productoResource extends JsonResource
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
            'codigo' => $this->codigo,
            'SKU' => $this->SKU,
            'nombre' => $this->nombre,
            'marca' => $this->marca,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'stock_anual' => $this->stock_anual,
            'categoria' => $this->categoria,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
