@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('sub_certificate_type_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.sub-certificate-types.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.subCertificateType.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.subCertificateType.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-SubCertificateType">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.subCertificateType.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.subCertificateType.fields.sub_certificate_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.subCertificateType.fields.main_certificate_type') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subCertificateTypes as $key => $subCertificateType)
                                    <tr data-entry-id="{{ $subCertificateType->id }}">
                                        <td>
                                            {{ $subCertificateType->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $subCertificateType->sub_certificate_type ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($subCertificateType->main_certificate_types as $key => $item)
                                                <span>{{ $item->certificate_type }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('sub_certificate_type_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.sub-certificate-types.show', $subCertificateType->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('sub_certificate_type_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.sub-certificate-types.edit', $subCertificateType->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('sub_certificate_type_delete')
                                                <form action="{{ route('frontend.sub-certificate-types.destroy', $subCertificateType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sub_certificate_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.sub-certificate-types.massDestroy') }}",
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
  let table = $('.datatable-SubCertificateType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection