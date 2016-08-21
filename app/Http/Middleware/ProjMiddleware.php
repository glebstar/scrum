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
		$projectId = false;

		if ($request->project_id) {
			$projectId = $request->project_id;
		} elseif ($request->column) {
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

		return $next($request);
	}
}
