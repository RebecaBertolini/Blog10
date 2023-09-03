<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //permite a passagem do conteudo do formulario
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:40'],
            'body' => 'required',
            'user' => 'required',
            'thumb' => ['nullable', 'image', 'dimensions:max_width=1000,max_height=1000', 'mimes:jpg,png,svg']
        ];
    }

    public function messages() {
        return [
            'required' => 'Este campo é obrigatório!',
            'image' => 'Esse arquivo não é um arquivo de imagem válido.',
            'dimensions' => 'Este arquivo não atende as especificações de dimensões.',
            'mimes' => 'Este arquivo possui uma extensão inválida.'
        ];
    }
}
