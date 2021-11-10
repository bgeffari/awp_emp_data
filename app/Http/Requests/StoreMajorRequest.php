<?php

namespace App\Http\Requests;

use App\Models\Major;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMajorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('major_create');
    }

    public function rules()
    {
        return [
            'major' => [
                'string',
                'required',
                'unique:majors',
            ],
            'sub_certificate_types.*' => [
                'integer',
            ],
            'sub_certificate_types' => [
                'required',
                'array',
            ],
        ];
    }
}
