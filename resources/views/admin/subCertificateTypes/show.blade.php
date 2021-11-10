@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subCertificateType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-certificate-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subCertificateType.fields.id') }}
                        </th>
                        <td>
                            {{ $subCertificateType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subCertificateType.fields.sub_certificate_type') }}
                        </th>
                        <td>
                            {{ $subCertificateType->sub_certificate_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subCertificateType.fields.main_certificate_type') }}
                        </th>
                        <td>
                            @foreach($subCertificateType->main_certificate_types as $key => $main_certificate_type)
                                <span class="label label-info">{{ $main_certificate_type->certificate_type }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sub-certificate-types.index') }}">
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
            <a class="nav-link" href="#sub_certificate_type_awp_emp_datas" role="tab" data-toggle="tab">
                {{ trans('cruds.awpEmpData.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#sub_certificate_type_majors" role="tab" data-toggle="tab">
                {{ trans('cruds.major.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="sub_certificate_type_awp_emp_datas">
            @includeIf('admin.subCertificateTypes.relationships.subCertificateTypeAwpEmpDatas', ['awpEmpDatas' => $subCertificateType->subCertificateTypeAwpEmpDatas])
        </div>
        <div class="tab-pane" role="tabpanel" id="sub_certificate_type_majors">
            @includeIf('admin.subCertificateTypes.relationships.subCertificateTypeMajors', ['majors' => $subCertificateType->subCertificateTypeMajors])
        </div>
    </div>
</div>

@endsection