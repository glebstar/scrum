<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Cards;
use App\Projects;
use App\Project_members;

class ProjMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Auth::user ()) {
            abort (403);
        }

        $projectId = false;

        // get project_id
        if ($request->project_id) {
            $projectId = $request->project_id;
        } elseif ($request->card_id) {
            $projectId = Cards::where ('card_id', $request->card_id)->first ()->project_id;
        } elseif ($request->id) {
            $projectId = $request->id;
        } else {
            abort (403);
        }

        // check user right on project
        $project = Project_members::where ('project_id', $projectId)->where ('member_id', Auth::user ()->id)->first ();
        if (! $project) {
            abort (403);
        }

        // check relation card -> project
        if ($request->card_id) {
            if (Cards::where('card_id', $request->card_id)->first()->project_id != $projectId) {
                abort (403);
            }
        }

        // check rights manager
        if ($request->column == 'Backlog' || $request->card_title) {
            $managerId = Projects::where ('project_id', $projectId)->first ()->project_manager_id;
            if ($managerId != Auth::user ()->id) {
                abort (403);
            }
        }

        // ok
        return $next($request);
    }
}
