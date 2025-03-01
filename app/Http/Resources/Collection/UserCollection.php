<?php

namespace App\Http\Resources\Collection;

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
        return [
            'data' => $this->collection,
            'total_rows' => $this->collection->count(),
            'success' => true,
            'message' => 'Users got successfully.'
        ];
    }
}
