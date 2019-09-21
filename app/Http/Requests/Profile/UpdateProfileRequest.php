<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\BaseRequest as Request;

class UpdateProfileRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,{$this->user()->id}",
        ];
    }
}
