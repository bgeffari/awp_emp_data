@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.mainCertificateType.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.main-certificate-types.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="certificate_type">{{ trans('cruds.mainCertificateType.fields.certificate_type') }}</label>
                            <input class="form-control" type="text" name="certificate_type" id="certificate_type" value="{{ old('certificate_type', '') }}" required>
                            @if($errors->has('certificate_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('certificate_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.mainCertificateType.fields.certificate_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection