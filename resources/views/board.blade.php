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
		@include('board.column', [
			'columnName' => 'Todo',
			'cards' => $cards,
		])

		@include('board.column', [
			'columnName' => 'Doing',
			'cards' => $cards,
		])

		@include('board.column', [
			'columnName' => 'Done',
			'cards' => $cards,
		])

		@include('board.column', [
			'columnName' => 'Backlog',
			'cards' => $cards,
		])
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
