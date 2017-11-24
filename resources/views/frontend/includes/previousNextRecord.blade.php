<ul class="pagination pagination-sm inline">
    @if($previousRecord and $previousRecord['model'])
        <li><a href="{{ route($previousRecord['route'], $previousRecord['model']->id) }}">«</a></li>
    @endif
    @if($nextRecord and $nextRecord['model'])
        <li><a href="{{ route($nextRecord['route'], $nextRecord['model']->id) }}">»</a></li>
    @endif
</ul>
