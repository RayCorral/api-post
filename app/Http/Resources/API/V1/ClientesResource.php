<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->CLIENTE,
            $this->NOMBRE,
            $this->DESC1,
            $this->PRECIO,
            $this->VEND,
            $this->ZONA,
            $this->SALDO,
            $this->bloqueado
        ];
    }
}
