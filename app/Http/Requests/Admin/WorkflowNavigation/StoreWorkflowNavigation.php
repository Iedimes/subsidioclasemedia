<?php

namespace App\Http\Requests\Admin\WorkflowNavigation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreWorkflowNavigation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.workflow-navigation.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'workflow_state_id' => ['required'],
            'next_workflow_state_id' => ['required'],

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getStateId()
    {
        if ($this->has('next_workflow_state_id')) {
            return $this->get('next_workflow_state_id')['id'];
        }
        return null;
    }
}
