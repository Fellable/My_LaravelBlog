<?php

namespace App\Http\Resources\API\Post;

use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResourse extends JsonResource
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
           'main_image' => $this->main_image,

        'images' => PostResource::collection($this->postImages),

    ];
    }
}
