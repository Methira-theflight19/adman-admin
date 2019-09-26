

<ul class="p-0 timeline-2">
    @each('backend.history.partials.item', $history, 'historyItem')
</ul>

@if ($paginate)
    <div class="pull-right">
        {{ $history->links() }}
    </div><!--pull-right-->
    <div class="clearfix"></div>
@endif