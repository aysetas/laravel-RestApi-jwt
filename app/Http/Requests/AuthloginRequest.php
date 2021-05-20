<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
// AuthLoginRequest olması gerek
class AuthloginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', function ($attribute, $value, $fail) {
                $email = User::where('email', $value)->first();
                if ($email == null) {
                    $fail($attribute.' does not exist.');
                }
            },],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
