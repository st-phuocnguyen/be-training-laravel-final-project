<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($request->isMethod('delete')) {
            return [];
        }
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    public function with($request)
    {

        return [
            "message" => $this->getMessage($request),
            "success" => true,
        ];
    }

    private function getMessage($request)
    {
        if ($request->isMethod('post')) {
            return "'User created successfully.";
        }
        if ($request->isMethod('put')) {
            return "'User updated successfully.";
        }
        if ($request->isMethod('delete')) {
            return "'User deleted successfully.";
        }
        if ($request->isMethod('get')) {
            return "'User showed successfully.";
        }
    }
}
