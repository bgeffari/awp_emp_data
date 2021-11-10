@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subCertificateType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub-certificate-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="sub_certificate_type">{{ trans('cruds.subCertificateType.fields.sub_certificate_type') }}</label>
                <input class="form-control {{ $errors->has('sub_certificate_type') ? 'is-invalid' : '' }}" type="text" name="sub_certificate_type" id="sub_certificate_type" value="{{ old('sub_certificate_type', '') }}" required>
                @if($errors->has('sub_certificate_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_certificate_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCertificateType.fields.sub_certificate_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="main_certificate_types">{{ trans('cruds.subCertificateType.fields.main_certificate_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('main_certificate_types') ? 'is-invalid' : '' }}" name="main_certificate_types[]" id="main_certificate_types" multiple required>
                    @foreach($main_certificate_types as $id => $main_certificate_type)
                        <option value="{{ $id }}" {{ in_array($id, old('main_certificate_types', [])) ? 'selected' : '' }}>{{ $main_certificate_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('main_certificate_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('main_certificate_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subCertificateType.fields.main_certificate_type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection