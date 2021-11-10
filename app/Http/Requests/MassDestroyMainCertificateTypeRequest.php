<?php

namespace App\Http\Requests;

use App\Models\MainCertificateType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMainCertificateTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('main_certificate_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:main_certificate_types,id',
        ];
    }
}
