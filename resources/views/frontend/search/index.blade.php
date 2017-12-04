@extends('frontend.layouts.page')

@section('content_header')
    <h1>Search</h1>
@endsection

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
                                       value="{{ $searchWord }}" placeholder="Search" required autofocus>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat">Go!</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    @foreach($results as $resultType => $result)
                        <div class="row">
                            <div class="col-xs-6">
                                <h3>{{ ucfirst($resultType) }} results:</h3>
                                <ul>
                                    @foreach($result as $value)
                                        <li>
                                            <a href="{{ route("frontend.$resultType.show", $value->id) }}"
                                               class="link-black text-sm">
                                                {{ $value->display_value }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
