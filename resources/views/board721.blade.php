@extends('board_master')

@section('content')
<div class="boards-container">
	<div class="row">
		<div class="col-md-15 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Todo</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="todo-lists">
					<div class="list-item clearfix">
						<p class="item-title">Test</p>
						<div class="clearfix">
							<div class="title-panel">
								<span title="Comments" class="glyphicon glyphicon-comment" aria-hidden="true"></span>
								<span class="number">2</span>
								<span title="Description" class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
								<span class="number">0</span>
								<span title="Attachments" class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
								<span class="number">2</span>
							</div>
							<div class="item-number pull-right">
								#<span>69</span>
							</div>
						</div>
						<div class="members-list pull-right clearfix">
							<span class="member" title="Brett Michael Trinidad">B</span>
							<span class="member" title="John Jay Anora">J</span>
						</div>
					</div>
					<div class="list-item clearfix">
						<p class="item-title">Test 2</p>
						<div class="clearfix">
							<div class="title-panel">
								<span title="Comments" class="glyphicon glyphicon-comment" aria-hidden="true"></span>
								<span class="number">1</span>
								<span title="Description" class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
								<span class="number">6</span>
								<span title="Attachments" class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
								<span class="number">9</span>
							</div>
							<div class="item-number pull-right">
								#<span>10</span>
							</div>
						</div>
						<div class="members-list pull-right clearfix">
							<span class="member" title="Brett Michael Trinidad">B</span>
							<span class="member" title="John Jay Anora">J</span>
						</div>
					</div>
				</div>
				<p class="add-card">Add a task</p>
				<div class="add-card-form hidden" id="todo-list-form">
					<form data-target="todo-list-form" data-insert="todo-lists">
						<textarea placeholder="Add a card" required></textarea>
						<div class="clearfix">
							<button class="add-card-submit">Add</button>
							<span class="glyphicon glyphicon-remove close-button" aria-hidden="true"></span>
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="col-md-15 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Doing</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="doing-lists">
					
				</div>
			</div>
		</div>
		<div class="col-md-15 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Waiting for Feedback</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="doing-lists">
					
				</div>
			</div>
		</div>		
		<div class="col-md-15 list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Done</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="done-lists">
					
				</div>
			</div>
		</div>
		<div class="col-md-15  list-cols">
			<div class="lists">
				<div class="list-head">
					<p class="list-title">Backlog</p>
					<div class="pull-right">
						<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
						<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					</div>
				</div>

				<div class="lists-holder" id="backlog-lists">
					
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
        <h4 class="modal-title text-left">#69</h4>
        <h4 class="modal-title text-center">Modal title</h4>
        <input class="card-name hidden" type="text" value="Card Name">
      </div>
      <div class="modal-body">
        <div class="input-field col s12">
		    <select multiple>
		      <option value="1">Option 1</option>
		      <option value="2">Option 2</option>
		      <option value="3">Option 3</option>
		    </select>
		    <label>Members</label>
	    </div>
	    <div class="input-field col s12">
	    	<input type="date" class="datepicker">
	    	<label>Due date</label>
	    </div>
	    <div class="input-field col s12" id="priority">
		    <select>
		      <option value="1">Option 1</option>
		      <option value="2">Option 2</option>
		      <option value="3">Option 3</option>
		    </select>
		    <label>Priority</label>
	    </div>
	    <div class="input-field col s12">
	    	<p>Weight</p>
		    <p class="range-field">
		      <input type="range" id="test5" min="0" max="100" />
		    </p>
	    </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
