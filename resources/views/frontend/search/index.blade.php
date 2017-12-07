@extends('frontend.layouts.page')

@section('content_header')
    <h1>Search</h1>
@endsection

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/select2/dist/css/select2.min.css') }}">
@endpush

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <form role="search" method="post" action="{{ route('frontend.search.result') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputSearchWord">Search words</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" name="searchWord" id="inputSearchWord" class="form-control"
                                       value="{{ isset($input['searchWord']) ? $input['searchWord'] : null }}"
                                       placeholder="Search" required autofocus>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat">Go!</button>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputFaculty" class="col-sm-2 control-label">Filter by faculties</label>
                                    <div class="col-sm-8">
                                        <select name="faculty[]" class="form-control select2" id="inputFaculty"
                                                multiple="multiple" data-placeholder="Select a Faculty">
                                            <option></option>
                                            @foreach($faculties as $faculty)
                                                <option
                                                        @if(isset($input['faculty']))
                                                        {{ (collect($input['faculty'])->contains($faculty->id)) ? 'selected':'' }}
                                                        @endif
                                                        value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('faculty'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('faculty') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    @yield('search_result')
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
