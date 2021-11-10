@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.awpEmpData.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.awp-emp-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.id') }}
                        </th>
                        <td>
                            {{ $awpEmpData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.emp_sap_number') }}
                        </th>
                        <td>
                            {{ $awpEmpData->emp_sap_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.main_certificate_type') }}
                        </th>
                        <td>
                            {{ $awpEmpData->main_certificate_type->certificate_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.sub_certificate_type') }}
                        </th>
                        <td>
                            {{ $awpEmpData->sub_certificate_type->sub_certificate_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.major') }}
                        </th>
                        <td>
                            {{ $awpEmpData->major->major ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.academic_facility') }}
                        </th>
                        <td>
                            {{ $awpEmpData->academic_facility->academic_facility ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.last_certificate_country') }}
                        </th>
                        <td>
                            {{ App\Models\AwpEmpData::LAST_CERTIFICATE_COUNTRY_RADIO[$awpEmpData->last_certificate_country] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.mobile') }}
                        </th>
                        <td>
                            {{ $awpEmpData->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.last_certificate_file') }}
                        </th>
                        <td>
                            @foreach($awpEmpData->last_certificate_file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.awp-emp-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection