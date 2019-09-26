<li>
    <div class="timeline-item">
       
        <i class="iround fa fa-{{ $historyItem->icon }} {{ $historyItem->class }}"></i>
        <h3 class="timeline-header no-border"><strong>{{ $historyItem->user->name }}</strong> {!! history()->renderDescription($historyItem->text, $historyItem->assets) !!}</h3>

        <span class="time"><i class="far fa-clock "></i> {{ $historyItem->created_at->diffForHumans() }}</span>
    </div>
</li>