<?php

namespace App\Http\Requests;

use App\Models\UserLevelQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserLevelQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_level_question_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'question_id' => [
                'required',
                'integer',
            ],
        ];
    }
}