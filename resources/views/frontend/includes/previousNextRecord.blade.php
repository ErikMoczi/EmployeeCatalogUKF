<ul class="pagination pagination-sm inline">
    @if(record_navigation_get_previous($navigationRecord))
        <li><a href="{{ record_navigation_get_previous($navigationRecord) }}">«</a></li>
    @endif
    @if(record_navigation_get_next($navigationRecord))
        <li><a href="{{ record_navigation_get_next($navigationRecord) }}">»</a></li>
    @endif
</ul>
