<?php

namespace App\Http\Requests;

use App\Models\SubCertificateType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubCertificateTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sub_certificate_type_create');
    }

    public function rules()
    {
        return [
            'sub_certificate_type' => [
                'string',
                'required',
                'unique:sub_certificate_types',
            ],
            'main_certificate_types.*' => [
                'integer',
            ],
            'main_certificate_types' => [
                'required',
                'array',
            ],
        ];
    }
}
