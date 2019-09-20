<?php

namespace App\Http\Resources;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Http\Resources\BaseResource as Resource;

class PhotoResource extends Resource
{
    use FileUpload;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $url = $this->url;

        if (! Str::is('http*', $this->url)) {
            $this->initStorage();
            $url = $this->storage->url($this->url);
        }

        return [
            'id' => $this->id,
            'url' => $url,
        ];
    }
}
