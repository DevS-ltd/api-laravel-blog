<?php

namespace App\Http\Resources;

use App\Traits\FileUpload;
use App\Http\Resources\BaseResource as Resource;

class UserResource extends Resource
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->when(auth()->id() === $this->id, $this->email),
            'avatar' => $this->when($this->avatar, function () {
                $this->initStorage();
                return $this->storage->url($this->avatar);
            }),
        ];
    }
}
