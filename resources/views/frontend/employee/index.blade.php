@extends('frontend.layouts.page')

@section('content_header')
    <h1>Employees</h1>
@endsection

@push('js')
    <script>
        $(function () {
            $('#myTable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        })
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of employees</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="myTable" class="table table-hover table-fixed dataTable">
                        <thead class="content-headerFixed">
                        <tr>
                            <th style="width: 10px;" class="text-center">#</th>
                            <th class="text-left">Name</th>
                            <th style="width: 15px;" class="text-center">Publications count</th>
                            <th style="width: 15px;" class="text-center">Projects count</th>
                            <th style="width: 15px;" class="text-center">Activities count</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        @foreach($tableData as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="text-left">
                                    {{ $item->full_name }}
                                </td>
                                <td class="text-center">
                                    <span class="label label-danger">
                                    {{ $item->publications_count }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-warning">
                                    {{ $item->projects_count }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-primary">
                                    {{ $item->activities_count }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('frontend.employee.show', $item->id) }}"
                                       class="btn btn-info btn-xs">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
