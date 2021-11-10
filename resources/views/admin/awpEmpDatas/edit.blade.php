@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.awpEmpData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.awp-emp-datas.update", [$awpEmpData->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="emp_sap_number">{{ trans('cruds.awpEmpData.fields.emp_sap_number') }}</label>
                <input class="form-control {{ $errors->has('emp_sap_number') ? 'is-invalid' : '' }}" type="number" name="emp_sap_number" id="emp_sap_number" value="{{ old('emp_sap_number', $awpEmpData->emp_sap_number) }}" step="1" required>
                @if($errors->has('emp_sap_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emp_sap_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.emp_sap_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.awpEmpData.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $awpEmpData->full_name) }}" required>
                @if($errors->has('full_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="main_certificate_type_id">{{ trans('cruds.awpEmpData.fields.main_certificate_type') }}</label>
                <select class="form-control select2 {{ $errors->has('main_certificate_type') ? 'is-invalid' : '' }}" name="main_certificate_type_id" id="main_certificate_type_id" required>
                    @foreach($main_certificate_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('main_certificate_type_id') ? old('main_certificate_type_id') : $awpEmpData->main_certificate_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('main_certificate_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('main_certificate_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.main_certificate_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_certificate_type_id">{{ trans('cruds.awpEmpData.fields.sub_certificate_type') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_certificate_type') ? 'is-invalid' : '' }}" name="sub_certificate_type_id" id="sub_certificate_type_id" required>
                    @foreach($sub_certificate_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sub_certificate_type_id') ? old('sub_certificate_type_id') : $awpEmpData->sub_certificate_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_certificate_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_certificate_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.sub_certificate_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="major_id">{{ trans('cruds.awpEmpData.fields.major') }}</label>
                <select class="form-control select2 {{ $errors->has('major') ? 'is-invalid' : '' }}" name="major_id" id="major_id" required>
                    @foreach($majors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('major_id') ? old('major_id') : $awpEmpData->major->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('major'))
                    <div class="invalid-feedback">
                        {{ $errors->first('major') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.major_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="academic_facility_id">{{ trans('cruds.awpEmpData.fields.academic_facility') }}</label>
                <select class="form-control select2 {{ $errors->has('academic_facility') ? 'is-invalid' : '' }}" name="academic_facility_id" id="academic_facility_id" required>
                    @foreach($academic_facilities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('academic_facility_id') ? old('academic_facility_id') : $awpEmpData->academic_facility->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('academic_facility'))
                    <div class="invalid-feedback">
                        {{ $errors->first('academic_facility') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.academic_facility_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.awpEmpData.fields.last_certificate_country') }}</label>
                @foreach(App\Models\AwpEmpData::LAST_CERTIFICATE_COUNTRY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('last_certificate_country') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="last_certificate_country_{{ $key }}" name="last_certificate_country" value="{{ $key }}" {{ old('last_certificate_country', $awpEmpData->last_certificate_country) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="last_certificate_country_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('last_certificate_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_certificate_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.last_certificate_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.awpEmpData.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="number" name="mobile" id="mobile" value="{{ old('mobile', $awpEmpData->mobile) }}" step="1" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_certificate_file">{{ trans('cruds.awpEmpData.fields.last_certificate_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('last_certificate_file') ? 'is-invalid' : '' }}" id="last_certificate_file-dropzone">
                </div>
                @if($errors->has('last_certificate_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_certificate_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.awpEmpData.fields.last_certificate_file_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedLastCertificateFileMap = {}
Dropzone.options.lastCertificateFileDropzone = {
    url: '{{ route('admin.awp-emp-datas.storeMedia') }}',
    maxFilesize: 3, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="last_certificate_file[]" value="' + response.name + '">')
      uploadedLastCertificateFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedLastCertificateFileMap[file.name]
      }
      $('form').find('input[name="last_certificate_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($awpEmpData) && $awpEmpData->last_certificate_file)
          var files =
            {!! json_encode($awpEmpData->last_certificate_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="last_certificate_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection