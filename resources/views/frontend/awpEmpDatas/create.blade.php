@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.awpEmpData.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.awp-emp-datas.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="emp_sap_number">{{ trans('cruds.awpEmpData.fields.emp_sap_number') }}</label>
                            <input class="form-control" type="number" name="emp_sap_number" id="emp_sap_number" value="{{ old('emp_sap_number', '') }}" step="1" required>
                            @if($errors->has('emp_sap_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('emp_sap_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.awpEmpData.fields.emp_sap_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="main_certificate_type_id">{{ trans('cruds.awpEmpData.fields.main_certificate_type') }}</label>
                            <select class="form-control select2" name="main_certificate_type_id" id="main_certificate_type_id" required>
                                @foreach($main_certificate_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('main_certificate_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="sub_certificate_type_id" id="sub_certificate_type_id" required>
                                @foreach($sub_certificate_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('sub_certificate_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="major_id" id="major_id" required>
                                @foreach($majors as $id => $entry)
                                    <option value="{{ $id }}" {{ old('major_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="academic_facility_id" id="academic_facility_id" required>
                                @foreach($academic_facilities as $id => $entry)
                                    <option value="{{ $id }}" {{ old('academic_facility_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                                <div>
                                    <input type="radio" id="last_certificate_country_{{ $key }}" name="last_certificate_country" value="{{ $key }}" {{ old('last_certificate_country', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="last_certificate_country_{{ $key }}">{{ $label }}</label>
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
                            <input class="form-control" type="number" name="mobile" id="mobile" value="{{ old('mobile', '') }}" step="1" required>
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.awpEmpData.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="last_certificate_file">{{ trans('cruds.awpEmpData.fields.last_certificate_file') }}</label>
                            <div class="needsclick dropzone" id="last_certificate_file-dropzone">
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

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedLastCertificateFileMap = {}
Dropzone.options.lastCertificateFileDropzone = {
    url: '{{ route('frontend.awp-emp-datas.storeMedia') }}',
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