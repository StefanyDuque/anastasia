<?php

namespace App\Http\Requests\API;

use App\Models\sesion;
use InfyOm\Generator\Request\APIRequest;

class CreatesesionAPIRequest extends APIRequest
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
        return sesion::$rules;
    }
}
