<?php

namespace App\Http\Requests\Profile;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BaseRequest as Request;

class UpdatePasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->old_password === null) {
            return true;
        }

        return Hash::check($this->old_password, auth()->user()->getAuthPassword());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
