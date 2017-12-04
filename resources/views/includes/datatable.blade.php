@push('js')
    {!! $dataTable->scripts() !!}
@endpush

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $dataTableBoxHeader }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        {!! $dataTable->table([], true) !!}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
