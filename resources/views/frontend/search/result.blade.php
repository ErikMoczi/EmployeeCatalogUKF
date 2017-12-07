@extends('frontend.search.index')

@section('search_result')
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
@endsection
