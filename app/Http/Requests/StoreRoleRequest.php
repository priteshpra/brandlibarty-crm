<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('role_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'RoleName' => 'required|max:50|unique:roles,RoleName',
            'Description' => 'nullable|max:50|unique:roles,Description',
            'permissions' => 'nullable|array',
            'permissions.*' => "integer|exists:permissions,id",
        ];
    }
}
