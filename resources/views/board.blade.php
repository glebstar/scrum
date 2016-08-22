@extends('board_master')

@section('content')
    <script>
	var projectId = {{ $projectId }};
    var card_members = [];
    var pausedtimers = [];
    var is_manager = @if($isManager) true
    @else false @endif;
</script>
    <div class="boards-container">
	<div class="row">
		<div class="col-md-3 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Todo</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="todo-lists">
					@foreach ($cards as $card)
                        @if ($card->card_column == 'Todo')
                            @include('board.card', array(
                                'card' => $card,
                            ))
                        @endif
                    @endforeach
				</div>
				<p class="add-card">Add a task</p>
				<div class="add-card-form hidden" id="todo-list-form">
					<form data-target="todo-list-form" data-insert="todo-lists">
						<textarea id="card_title" name="card_title" placeholder="Add a card" required></textarea>
						<div class="clearfix">
							<input type="submit" value="Add" id="submitAddCard" class="add-card-submit">
                            <!-- <button class="add-card-submit">Add</button> -->
							<span class="glyphicon glyphicon-remove close-button" aria-hidden="true"></span>
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Doing</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="doing-lists">
					@foreach ($cards as $card)
                        @if ($card->card_column == 'Doing')
                            @include('board.card', array(
                                'card' => $card,
                            ))
                        @endif
                    @endforeach
				</div>
			</div>
		</div>
		<div class="col-md-3 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Done</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="done-lists">
					@foreach ($cards as $card)
                        @if ($card->card_column == 'Done')
                            @include('board.card', [
                                'card' => $card,
                            ])
                        @endif
                    @endforeach
				</div>
			</div>
		</div>
		<div class="col-md-3 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Backlog</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="backlog-lists">
					@foreach ($cards as $card)
                        @if ($card->card_column == 'Backlog')
                            @include('board.card', array(
                                'card' => $card,
                            ))
                        @endif
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@include('board.modal', [
	'projectId' => $projectId,
])

<div class="hide" id="all-members">
	@foreach($members as $user)
            <option data-member-id="{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</div>

@endsection
