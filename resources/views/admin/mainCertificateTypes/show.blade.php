@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mainCertificateType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.main-certificate-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mainCertificateType.fields.id') }}
                        </th>
                        <td>
                            {{ $mainCertificateType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mainCertificateType.fields.certificate_type') }}
                        </th>
                        <td>
                            {{ $mainCertificateType->certificate_type }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.main-certificate-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#main_certificate_type_awp_emp_datas" role="tab" data-toggle="tab">
                {{ trans('cruds.awpEmpData.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#main_certificate_type_sub_certificate_types" role="tab" data-toggle="tab">
                {{ trans('cruds.subCertificateType.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#main_certificate_type_academic_facilities" role="tab" data-toggle="tab">
                {{ trans('cruds.academicFacility.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="main_certificate_type_awp_emp_datas">
            @includeIf('admin.mainCertificateTypes.relationships.mainCertificateTypeAwpEmpDatas', ['awpEmpDatas' => $mainCertificateType->mainCertificateTypeAwpEmpDatas])
        </div>
        <div class="tab-pane" role="tabpanel" id="main_certificate_type_sub_certificate_types">
            @includeIf('admin.mainCertificateTypes.relationships.mainCertificateTypeSubCertificateTypes', ['subCertificateTypes' => $mainCertificateType->mainCertificateTypeSubCertificateTypes])
        </div>
        <div class="tab-pane" role="tabpanel" id="main_certificate_type_academic_facilities">
            @includeIf('admin.mainCertificateTypes.relationships.mainCertificateTypeAcademicFacilities', ['academicFacilities' => $mainCertificateType->mainCertificateTypeAcademicFacilities])
        </div>
    </div>
</div>

@endsection