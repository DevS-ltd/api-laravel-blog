<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\BaseRequest as Request;

class UploadAvatarRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'required|image|max:2048',
        ];
    }
}
