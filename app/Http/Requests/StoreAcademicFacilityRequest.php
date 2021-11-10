<?php

namespace App\Http\Requests;

use App\Models\AcademicFacility;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAcademicFacilityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('academic_facility_create');
    }

    public function rules()
    {
        return [
            'academic_facility' => [
                'string',
                'required',
                'unique:academic_facilities',
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
