<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
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
            'news_code' => $this->news_code,
            'news_title' => $this->news_title,
            'news_content_short' => substr($this->news_content, 0, 100),
            'news_content_long' => $this->news_content,
            'news_media' => $this->news_media,
            'news_publisher' => $this->news_publisher,
            'news_date_create' => $this->news_date_create,
            'news_media_link' => ($this->news_media == null ? asset('assets/img/default.jpg') : asset('storage/cover_images/' . $this->news_media)),
        ];
    }
}
