<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaEditRequest extends FormRequest
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
        return [
            'nombreEdit' => 'required|string|min:3|max:100',
            'descripcionEdit' => 'required|string|min:5|max:255',
            'imgEdit' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nombreEdit.required' => 'El nombre es obligatorio',
            'nombreEdit.min' => 'El nombre debe tener al menos 3 caracteres',
            'descripcionEdit.required' => 'La descripción es obligatoria',
            'descripcionEdit.min' => 'La descripción es muy corta',
            'imgEdit.image' => 'El archivo debe ser una imagen',
            'imgEdit.mimes' => 'Solo se permiten imágenes JPG, PNG o WEBP',
            'imgEdit.max' => 'La imagen no debe pesar más de 2MB',
        ];
    }
}
