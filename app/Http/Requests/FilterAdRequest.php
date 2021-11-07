<?php

namespace App\Http\Requests;

use App\Http\Traits\RespondsWithHttpStatus;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FilterAdRequest extends FormRequest
{
    use RespondsWithHttpStatus;
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
            'tag' => 'exists:tags,title',
            'category' => 'exists:categories,title',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();
        throw new HttpResponseException($this->failure($errors->first()));
    }
}
