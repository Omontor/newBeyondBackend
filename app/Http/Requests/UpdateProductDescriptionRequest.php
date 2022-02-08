<?php

namespace App\Http\Requests;

use App\Models\ProductDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_description_edit');
    }

    public function rules()
    {
        return [
            'language' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
