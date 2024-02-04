<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlcoholicBeverageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('put')) {

            return [
                'name' => 'required|unique:alcoholic_beverages,name,' . $this->alcoholic_beverage->id . '|max:255',
                'alcohol_content' => 'required',
            ];
        }

        return [
            'name' => 'required|unique:alcoholic_beverages|max:255',
            'alcohol_content' => 'required',
        ];
    }

    // バリデーションに失敗した場合は、リダイレクトせず view を返す
    protected function failedValidation(Validator $validator)
    {
        $view = '';
        $data = [];

        if ($this->isMethod('post')) {

            $view = 'alcoholic_beverage.create';
            $data = [
                'name' => $this->name,
                'alcohol_content' => $this->alcohol_content,
                'errors' => $validator->errors(),
            ];
        } else if ($this->isMethod('put')) {

            $view = 'alcoholic_beverage.edit';
            $alcoholic_beverage = $this->route('alcoholic_beverage');
            $data = [
                'alcoholic_beverage' => $alcoholic_beverage,
                'name' => $this->name,
                'alcohol_content' => $this->alcohol_content,
                'errors' => $validator->errors(),
            ];
        }

        $response = response()->view($view, $data);

        throw new HttpResponseException($response);
    }

    public function attributes()
    {
        return [
            'name' => 'お酒の名前',
            'alcohol_content' => 'アルコール度数',
        ];
    }
}
