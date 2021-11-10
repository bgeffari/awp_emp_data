<?php

namespace App\Http\Requests;

use App\Models\AwpEmpData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAwpEmpDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('awp_emp_data_edit');
    }

    public function rules()
    {
        return [
            'emp_sap_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:awp_emp_datas,emp_sap_number,' . request()->route('awp_emp_data')->id,
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'main_certificate_type_id' => [
                'required',
                'integer',
            ],
            'sub_certificate_type_id' => [
                'required',
                'integer',
            ],
            'major_id' => [
                'required',
                'integer',
            ],
            'academic_facility_id' => [
                'required',
                'integer',
            ],
            'last_certificate_country' => [
                'required',
            ],
            'mobile' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:awp_emp_datas,mobile,' . request()->route('awp_emp_data')->id,
            ],
            'last_certificate_file' => [
                'array',
            ],
        ];
    }
}
