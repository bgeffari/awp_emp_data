@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.major.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.majors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="major">{{ trans('cruds.major.fields.major') }}</label>
                <input class="form-control {{ $errors->has('major') ? 'is-invalid' : '' }}" type="text" name="major" id="major" value="{{ old('major', '') }}" required>
                @if($errors->has('major'))
                    <div class="invalid-feedback">
                        {{ $errors->first('major') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.major.fields.major_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_certificate_types">{{ trans('cruds.major.fields.sub_certificate_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sub_certificate_types') ? 'is-invalid' : '' }}" name="sub_certificate_types[]" id="sub_certificate_types" multiple required>
                    @foreach($sub_certificate_types as $id => $sub_certificate_type)
                        <option value="{{ $id }}" {{ in_array($id, old('sub_certificate_types', [])) ? 'selected' : '' }}>{{ $sub_certificate_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_certificate_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_certificate_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.major.fields.sub_certificate_type_helper') }}</span>
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