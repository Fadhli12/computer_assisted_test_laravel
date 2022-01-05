<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccessRoomRequest extends FormRequest
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
            'key' => 'required|unique:access_rooms,key',
            'room_id' => 'required',
            'type' => 'required',
            'valid_until' => 'required|date',
            'limit_access' => 'required',
            'is_active' => 'required|boolean',
        ];
    }
}
