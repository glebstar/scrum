@extends('board_master')

@section('content')
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
				<p class="add-card">Add a card</p>
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
		<div class="col-md-3 list-cols">
			<div class="lists">
				two
			</div>
		</div>
		<div class="col-md-3 list-cols">
			<div class="lists">
				three
			</div>
		</div>
		<div class="col-md-3 list-cols">
			<div class="lists">
				four
			</div>
		</div>
	</div>
</div>
@endsection


