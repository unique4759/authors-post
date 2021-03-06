<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Author as AuthorResource;

class Post extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'disabled' => $this->disabled,
            'authors' => AuthorResource::collection($this->authors),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
