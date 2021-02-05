<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class categoriaResource extends JsonResource
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
            'id_categoria' => $this->id_categoria,
            'slug' => $this->slug,
            'nombre' => $this->nombre,
            'categoria_padre' => $this->categoria_padre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
