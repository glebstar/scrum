<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class ProjMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (! Auth::user()) {
			abort(403);
		}

		$projectId = false;

		if ($request->project_id) {
			$projectId = $request->project_id;
		} elseif ($request->card_id) {
			$projectId = \App\Cards::where('card_id', $request->card_id)->first()->project_id;
		} elseif ($request->id) {
			$projectId = $request->id;
		} else {
			abort(403);
		}

		$project = \App\Project_members::where('project_id', $projectId)->where('member_id', Auth::user()->id)->first();
		if (! $project) {
			abort(403);
		}

		if ($request->column == 'Backlog') {
			$managerId = \App\Projects::where('project_id', $projectId)->first()->project_manager_id;
			if ($managerId != Auth::user()->id) {
				abort(403);
			}
		}

		return $next($request);
	}
}
