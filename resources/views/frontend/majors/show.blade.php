@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.major.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.majors.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.majors.index') }}">
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