@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.academicFacility.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.academic-facilities.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.academic-facilities.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection