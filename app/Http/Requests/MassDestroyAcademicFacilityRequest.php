<?php

namespace App\Http\Requests;

use App\Models\AcademicFacility;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAcademicFacilityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('academic_facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:academic_facilities,id',
        ];
    }
}
