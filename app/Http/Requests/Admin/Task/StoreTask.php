<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize(): bool
    {
        return Gate::allows('admin.task.create');
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'NroExp' => ['required', 'unique:tasks'],
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'government_id' => ['required', 'string'],
            'name_couple' => ['sometimes'],
            'last_name_couple' => ['sometimes'],
            'government_id_couple' => ['sometimes'],
            'state' => ['required'],
            'city' => ['required'],
            'farm' => ['sometimes'],
            'account' => ['nullable', 'string'],
            'amount' => ['required', 'integer'],
            'workflow' => ['required'],
            'category' => ['required'],

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

    public function getWorkFlowId()
    {
        if ($this->has('workflow')) {
            return $this->get('workflow')['id'];
        }
        return null;
    }

    public function getGetCategoryId()
    {
        if ($this->has('category')) {
            return $this->get('category')['id'];
        }
        return null;
    }

    public function getStateId()
    {
        if ($this->has('state')) {
            return $this->get('state')['DptoId'];
        }
        return null;
    }

    public function getCityId()
    {
        if ($this->has('city')) {
            return $this->get('city')['CiuId'];
        }
        return null;
    }
}
