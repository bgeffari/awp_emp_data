<?php

namespace App\Http\Requests;

use App\Models\Major;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMajorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('major_edit');
    }

    public function rules()
    {
        return [
            'major' => [
                'string',
                'required',
                'unique:majors,major,' . request()->route('major')->id,
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
