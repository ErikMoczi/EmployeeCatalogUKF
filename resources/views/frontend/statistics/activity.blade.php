@extends('frontend.layouts.page')

@section('content_header')
    <h1>Activity statistics</h1>
@endsection

@push('css')
    {!! Charts::styles() !!}
@endpush

@push('js')
    {!! Charts::scripts() !!}
    {!! $countryChart->script() !!}
    {!! $typeChart->script() !!}
    {!! $categoryChart->script() !!}
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#country" data-toggle="tab">Country</a></li>
                    <li><a href="#type" data-toggle="tab">Type</a></li>
                    <li><a href="#category" data-toggle="tab">Category</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="country">
                        {!! $countryChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="type">
                        {!! $typeChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="category">
                        {!! $categoryChart->html() !!}
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>

@endsection
