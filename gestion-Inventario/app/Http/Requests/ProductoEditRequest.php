<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoEditRequest extends FormRequest
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
            'nombreEdit' => 'required|string|max:100',
            'descripcionEdit' => 'nullable|string',
            'precioEdit' => 'required|numeric|min:0.01',
            'cantidadEdit' => 'required|integer|min:0',
            'categoria_idEdit' => 'required|exists:categorias,id',
            'imagenEdit' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
     public function messages(): array
    {
        return [
            'nombreEdit.required' => 'El nombre del producto es obligatorio.',
            'nombreEdit.max' => 'El nombre no puede exceder los 100 caracteres.',
            'precioEdit.required' => 'El precio es obligatorio.',
            'precioEdit.numeric' => 'El precio debe ser un número válido.',
            'precioEdit.min' => 'El precio debe ser mayor a 0.',
            'cantidadEdit.required' => 'La cantidad es obligatoria.',
            'cantidadEdit.integer' => 'La cantidad debe ser un número entero.',
            'cantidadEdit.min' => 'La cantidad no puede ser negativa.',
            'categoria_idEdit.required' => 'Debes seleccionar una categoría.',
            'categoria_idEdit.exists' => 'La categoría seleccionada no es válida.',
            'imagenEdit.image' => 'El archivo debe ser una imagen.',
            'imagenEdit.mimes' => 'La imagen debe ser JPG, PNG o WEBP.',
            'imagenEdit.max' => 'La imagen no debe pesar más de 2MB.',
        ];
    }
}
