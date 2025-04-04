<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('role_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'RoleName' => 'required|max:50|unique:roles,RoleName,' . $this->role->RoleID,
            // 'Description' => 'nullable|max:50|unique:roles,Description,' . $this->role->RoleID,
            'permissions' => 'nullable|array',
            'permissions.*' => "integer|exists:permissions,id",
        ];
    }
}
