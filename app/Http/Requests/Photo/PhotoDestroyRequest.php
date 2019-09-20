<?php

namespace App\Http\Requests\Photo;

use App\Http\Requests\BaseRequest as Request;

class PhotoDestroyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->post->user_id === auth()->id() && $this->post->id === $this->photo->post_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
