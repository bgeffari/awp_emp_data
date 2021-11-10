@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('academic_facility_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.academic-facilities.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.academicFacility.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.academicFacility.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AcademicFacility">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.academicFacility.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.academicFacility.fields.academic_facility') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.academicFacility.fields.main_certificate_type') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($academicFacilities as $key => $academicFacility)
                                    <tr data-entry-id="{{ $academicFacility->id }}">
                                        <td>
                                            {{ $academicFacility->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $academicFacility->academic_facility ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($academicFacility->main_certificate_types as $key => $item)
                                                <span>{{ $item->certificate_type }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('academic_facility_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.academic-facilities.show', $academicFacility->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('academic_facility_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.academic-facilities.edit', $academicFacility->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('academic_facility_delete')
                                                <form action="{{ route('frontend.academic-facilities.destroy', $academicFacility->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('academic_facility_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.academic-facilities.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AcademicFacility:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection