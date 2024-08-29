<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
'title'     => 'required',
            'sinopsis'  => 'required|min:20',
            'year'      => 'required|integer',
            // 'poster'    => 'required|image|mimes:png,jpg,jpeg,gif',
            'genre_id'  => 'required|exists:genres,id',
        ];
    }
    public function failedValidation(validator $valodator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' =>'Validation error',
            'data' => $validator->errors(),
        ]));
    }
}
