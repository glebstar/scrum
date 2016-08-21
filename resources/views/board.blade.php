@extends('board_master')

@section('content')

<script>
	var card_members = [];
	var pausedtimers = [];
	var is_manager = @if($isManager) true @else false @endif;
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
						<textarea id="card_title" name="card_title"  placeholder="Add a card" required></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="card-display">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left card-number-modal"></h4>
        <h4 class="modal-title text-center card-title-modal"></h4>
        <input class="card-name hidden" type="text" value="Card Name">
      </div>
      <div class="modal-body">
        <div class="input-field" id="members-dropdown" data-card-id="" data-project-id="{{ $projectId }}">
	        <div class="members-list members-dp">
			</div>
			<div class="inputs">
			</div>
		    <label class="member-label">Members</label>
	    </div>
	    <div class="input-field col s12">
	    	<div class='input-group date'>
                <input id="datetimepicker1" type="text" >
            </div>
	    </div>

	    <div class="input-field col s12" id="priority">
		    <select>
		      <option value="0" selected>N/A</option>
		      <option value="1">Yes</option>
		    </select>
		    <label>Priority</label>
	    </div>

	    <div class="input-field col s12">
	    	<p class="weight">Weight</p>
		    <p class="range-field">
		      <input type="range" id="test5" min="0" max="100" />
		    </p>
	    </div>

	    <div class="comment-section">
	    	<h5>Comments <span class="glyphicon glyphicon-comment" aria-hidden="true"></span></h5>

	    	<div class="comments-list">
	    		<div class="comment">
	    			
	    		</div>
	    	</div>
	    	<div class="add-comment">
	    		<div class="members-list">
					<span class="member" title="{{ \Auth::user()->name }}">{{ substr(\Auth::user()->name, 0, 1) }}</span>
				</div>
	    		<textarea></textarea>
	    		<button id="add-comment">Add comment</button>
	    	</div>
	    </div>
		<div class="backlog-button">
	    	<button class="btn btn-info" id="to-backlog-btn" style="margin-top: 20px;">To Backlog</button>
	    </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="hide" id="all-members">
	@foreach($members as $user)
		<option data-member-id="{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}</option>
	@endforeach
</div>

@endsection
