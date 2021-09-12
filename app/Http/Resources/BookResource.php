<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'editition' => $this->editition,
            'author' => $this->author,
            'publisher' => $this->publisher,
            'user_id' => $this->user_id,
            'category' => new CategoryResource($this->category),
            'comments' => new CommentCollection($this->comments),
            'likes' => new LikeCollection($this->likes)
        ];
    }
}
