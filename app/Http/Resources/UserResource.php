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
            $this->mergeWhen(auth()->id() === $this->id, [
                'email' => $this->email,
                'is_verified' => boolval($this->email_verified_at),
            ]),
            'avatar' => $this->when($this->avatar, function () {
                $this->initStorage();

                return $this->storage->url($this->avatar);
            }),
        ];
    }
}
