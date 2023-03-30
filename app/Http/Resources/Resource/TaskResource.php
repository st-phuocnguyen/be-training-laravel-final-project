<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'assignee' => $this->assignee,
            'estimate' => $this->estimate,
            'actual' => $this->actual,
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
            return "'Task created successfully.";
        }
        if ($request->isMethod('put')) {
            return "'Task updated successfully.";
        }
        if ($request->isMethod('delete')) {
            return "'Task deleted successfully.";
        }
        if ($request->isMethod('get')) {
            return "'Task showed successfully.";
        }
    }
}
