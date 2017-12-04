@extends('frontend.layouts.page')

@section('content_header')
    <h1>General statistics</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Total record of specifics dataset</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Dataset</th>
                            <th class="text-center" style="width: 30px">Total</th>
                            <th class="text-center">Link</th>
                        </tr>
                        @foreach($dataCount as $item)
                            <tr>
                                <td class="text-left">{{ ucfirst($item->table_name) }}</td>
                                <td class="text-right"><span class="badge bg-red-gradient">{{ $item->aggregate_count }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('frontend.'. $item->table_name .'.index') }}" class="btn btn-warning btn-xs">See more</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
