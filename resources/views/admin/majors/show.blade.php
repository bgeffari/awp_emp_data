@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.major.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.majors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.major.fields.id') }}
                        </th>
                        <td>
                            {{ $major->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.major.fields.major') }}
                        </th>
                        <td>
                            {{ $major->major }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.major.fields.sub_certificate_type') }}
                        </th>
                        <td>
                            @foreach($major->sub_certificate_types as $key => $sub_certificate_type)
                                <span class="label label-info">{{ $sub_certificate_type->sub_certificate_type }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.majors.index') }}">
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
            <a class="nav-link" href="#major_awp_emp_datas" role="tab" data-toggle="tab">
                {{ trans('cruds.awpEmpData.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="major_awp_emp_datas">
            @includeIf('admin.majors.relationships.majorAwpEmpDatas', ['awpEmpDatas' => $major->majorAwpEmpDatas])
        </div>
    </div>
</div>

@endsection