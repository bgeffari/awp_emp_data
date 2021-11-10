@can('awp_emp_data_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.awp-emp-datas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.awpEmpData.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.awpEmpData.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-subCertificateTypeAwpEmpDatas">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.emp_sap_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.full_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.main_certificate_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.sub_certificate_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.major') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.academic_facility') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.last_certificate_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.awpEmpData.fields.last_certificate_file') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($awpEmpDatas as $key => $awpEmpData)
                        <tr data-entry-id="{{ $awpEmpData->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $awpEmpData->id ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->emp_sap_number ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->main_certificate_type->certificate_type ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->sub_certificate_type->sub_certificate_type ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->major->major ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->academic_facility->academic_facility ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AwpEmpData::LAST_CERTIFICATE_COUNTRY_RADIO[$awpEmpData->last_certificate_country] ?? '' }}
                            </td>
                            <td>
                                {{ $awpEmpData->mobile ?? '' }}
                            </td>
                            <td>
                                @foreach($awpEmpData->last_certificate_file as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('awp_emp_data_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.awp-emp-datas.show', $awpEmpData->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('awp_emp_data_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.awp-emp-datas.edit', $awpEmpData->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('awp_emp_data_delete')
                                    <form action="{{ route('admin.awp-emp-datas.destroy', $awpEmpData->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('awp_emp_data_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.awp-emp-datas.massDestroy') }}",
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
  let table = $('.datatable-subCertificateTypeAwpEmpDatas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection