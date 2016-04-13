<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BlogFormRequest extends Request
{
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
            'title' => 'required|max:255',
            'content' => 'required|min:10',
            'image' => 'image'
        ];
    }
    
    public function messages() {
        return [
            "image" => "Featured image must be an image (png, jpg, bmp)"
        ];
    }
}
