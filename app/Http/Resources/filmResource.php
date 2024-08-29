<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class filmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'title' => $this->title,
            'sinopsis' => $this->sinopsis,
            'genre' => $this->genre_id,
            'poster' =>$this->poster,
            'year' =>$this->year
        ];
    }
}
