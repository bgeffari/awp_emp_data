<?php

namespace App\Http\Requests;

use App\Models\MainCertificateType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMainCertificateTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('main_certificate_type_create');
    }

    public function rules()
    {
        return [
            'certificate_type' => [
                'string',
                'required',
                'unique:main_certificate_types',
            ],
        ];
    }
}
