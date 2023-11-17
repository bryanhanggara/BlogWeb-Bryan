<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogRequest extends FormRequest
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
            'category' => 'required|max:191',
            'judul' => 'required|max:255',
            'isi_blog' => 'required',
            'user_id'=> 'required|integer|exists:users,id',
            'image_blog' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'head_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Field Author harus diisi.',
            'blog_image.required' => 'Field Blog Image harus diisi.',
            'blog_image.image' => 'Field Blog Image harus berupa gambar.',
            'blog_image.mimes' => 'Format gambar Blog Image tidak valid. Gunakan format: jpeg, png, jpg, gif, atau svg.',
            'blog_image.max' => 'Ukuran gambar Blog Image tidak boleh lebih dari 2MB.',
            'head_image.required' => 'Field Head Image harus diisi.',
            'head_image.image' => 'Field Head Image harus berupa gambar.',
            'head_image.mimes' => 'Format gambar Head Image tidak valid. Gunakan format: jpeg, png, jpg, gif, atau svg.',
            'head_image.max' => 'Ukuran gambar Head Image tidak boleh lebih dari 2MB.',
        ];
    }
}
