<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
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
            'slug' => $this->slug,
            'preview' => substr($this->preview, 0, 100).'...',
            'content' => $this->content,
            'thumbnail' => $this->thumbnail,
            'timestamp' => $this->created_at->format('jS F Y')
        ];
    }
}
