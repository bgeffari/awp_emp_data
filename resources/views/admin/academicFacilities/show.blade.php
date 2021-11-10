@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.academicFacility.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.academic-facilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.academicFacility.fields.id') }}
                        </th>
                        <td>
                            {{ $academicFacility->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicFacility.fields.academic_facility') }}
                        </th>
                        <td>
                            {{ $academicFacility->academic_facility }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.academicFacility.fields.main_certificate_type') }}
                        </th>
                        <td>
                            @foreach($academicFacility->main_certificate_types as $key => $main_certificate_type)
                                <span class="label label-info">{{ $main_certificate_type->certificate_type }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.academic-facilities.index') }}">
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
            <a class="nav-link" href="#academic_facility_awp_emp_datas" role="tab" data-toggle="tab">
                {{ trans('cruds.awpEmpData.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="academic_facility_awp_emp_datas">
            @includeIf('admin.academicFacilities.relationships.academicFacilityAwpEmpDatas', ['awpEmpDatas' => $academicFacility->academicFacilityAwpEmpDatas])
        </div>
    </div>
</div>

@endsection