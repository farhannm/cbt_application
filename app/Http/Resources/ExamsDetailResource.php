<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamsDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'time' => $this->time,
            'total_question' => $this->total_question,
            'question_type' => $this->question_type,
            'start' => $this->start,
            'end' => $this->end,
            'created_by' => $this->created_by,
            'oleh' => $this->whenLoaded('oleh')
        ];
    }
}
