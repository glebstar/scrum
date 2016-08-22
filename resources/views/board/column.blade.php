<div class="col-md-3 list-cols">
	<div class="lists">
		<div class="list-head">
			<p class="list-title">{{ $columnName }}</p>
			<div class="pull-right">
				<span title="Sort" class="glyphicon glyphicon-sort" aria-hidden="true"></span>
				<span title="Actions" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</div>
		</div>

		<div class="lists-holder" id="{{ strtolower($columnName) }}-lists">
			@foreach ($cards as $card)
				@if ($card->card_column == $columnName)
					@include('board.card', array(
						'card' => $card,
					))
				@endif
			@endforeach
		</div>
		@if($columnName == 'Todo')
		<p class="add-card">Add a task</p>
		<div class="add-card-form hidden" id="todo-list-form">
			<form data-target="todo-list-form" data-insert="todo-lists">
				<textarea id="card_title" name="card_title" placeholder="Add a card" required></textarea>
				<div class="clearfix">
					<input type="submit" value="Add" id="submitAddCard" class="add-card-submit">
					<span class="glyphicon glyphicon-remove close-button" aria-hidden="true"></span>
				</div>
			</form>
		</div>
		@endif
	</div>
</div>