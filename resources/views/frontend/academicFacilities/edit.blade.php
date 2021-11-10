@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.academicFacility.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.academic-facilities.update", [$academicFacility->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="academic_facility">{{ trans('cruds.academicFacility.fields.academic_facility') }}</label>
                            <input class="form-control" type="text" name="academic_facility" id="academic_facility" value="{{ old('academic_facility', $academicFacility->academic_facility) }}" required>
                            @if($errors->has('academic_facility'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('academic_facility') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicFacility.fields.academic_facility_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="main_certificate_types">{{ trans('cruds.academicFacility.fields.main_certificate_type') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="main_certificate_types[]" id="main_certificate_types" multiple required>
                                @foreach($main_certificate_types as $id => $main_certificate_type)
                                    <option value="{{ $id }}" {{ (in_array($id, old('main_certificate_types', [])) || $academicFacility->main_certificate_types->contains($id)) ? 'selected' : '' }}>{{ $main_certificate_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('main_certificate_types'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('main_certificate_types') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.academicFacility.fields.main_certificate_type_helper') }}</span>
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