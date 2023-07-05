<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        return [
            'status' => 'success',
            'data' => $this->collection,
            'meta' => [
                'total' => $this->total(),
                'currentPage' => $this->currentPage(),
                'perPage' => $this->perPage(),
                'path' => $this->path()
            ],
        ];
    }
}