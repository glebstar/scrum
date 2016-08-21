<div id="card-number-{{ $card->card_id }}" data-column="{{ $card->card_column }}" data-due="{{ date('m-d-Y H:i:s', $card->due_time)}}" class="list-item clearfix">
    <div class="item-body">
        <p class="item-title">{{ $card->card_title }}</p>
        <div class="clearfix">
            <div class="title-panel">
                <span title="Comments" class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                <span class="number">0</span>
                <span title="Description" class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                <span class="number">0</span>
                <span title="Attachments" class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                <span class="number">0</span>
            </div>
            <div class="item-number pull-right">#<span>{{ $card->card_id }}</span></div>
        </div>
        <div class="clearfix">
            <div class="members-list pull-right clearfix"></div>
        </div>
    </div>
    @if($card->card_column == 'Todo')
        <p class="start-card" data-target="doing-lists">Start</p>
    @elseif($card->card_column == 'Doing')
        <p class="status-card">
        <span class="pause pull-left double-status" data-target="todo-lists">Pause</span>
        <span class="timer">00:00:00</span><span class="done pull-right double-status" data-target="done-lists">Done</span>
    </p>
    @elseif($card->card_column == 'Done')
        <div class="status-holder">
            <p class="completed pending">Waiting for feedback</p>
            <div class="change-status hidden">
                <p>Set as Completed</p>
            </div>
        </div>
    @endif
</div>
<script>
    card_members[{{ $card->card_id }}] = [];
    @foreach($card->members()->get() as $m)
    card_members[{{ $card->card_id }}].push({{$m->user_id}});
    @endforeach
</script>

<div id="card-members-{{ $card->card_id }}" class="hidden">
    @foreach($card->members()->get() as $m)
        <span class="member" title="{{ $m->user()->getResults()->name }}"><?php echo substr($m->user()->getResults()->name, 0, 1); ?></span>
    @endforeach
</div>