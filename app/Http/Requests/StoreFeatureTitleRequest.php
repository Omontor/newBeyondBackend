<?php

namespace App\Http\Requests;

use App\Models\FeatureTitle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeatureTitleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('feature_title_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'language_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
