<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:5',
            'price'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpg,bmp,png,webp'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Il nome del prodotto é richiesto!',
            'name.min'=>'Il nome del prodotto deve essere minimo di 5 caratteri',
            'price.required'=>'Il prezzo é richiesto!',
            'description.required'=>'la descrizione é richiesta',
            // 'image.mimes'=>'Formato immagine sbagliato, iserire un jpg, bmp, png, webp'
        ];
    }
}
