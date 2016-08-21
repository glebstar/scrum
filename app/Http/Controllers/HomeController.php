<?php namespace App\Http\Controllers;

use App\Project_members;
use App\User;
use App\Projects;
use App\Cards;
use App\Card_members;
use Illuminate\Http\Response;
use Input,Validator;
use phpDocumentor\Reflection\Project;
use Request;
use Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('scrumy_home',['user' => Auth::user()->projects()]);
	}

	public function register(){
		return view('scrumy_create_project');
	}

	public function display_board1($projectID, $userID){

		$card = Card_members::where('user_id','=',$userID)->get();

		return view('board');
	}
	
	public function display_board($projectId){
		$cards = Cards::where('project_id', $projectId)->get();
		$now = \time();

		foreach ($cards as $c) {
			$dateDue = new \DateTime($c->card_duedate);
			$c->due_time = $dateDue->getTimestamp ();
			if($dateDue->getTimestamp () <= $now ) {
				$c->card_column = 'Backlog';
			}
		}

		return view('board', [
			'cards' => $cards,
			'projectId' => $projectId,
			'members' => User::all(),
			'isManager' => Auth::user()->id == \App\Projects::where('project_id', $projectId)->first()->project_manager_id
		]);
	}

	public function saveProject(){
		$proj_details = Input::all();
		
        $validation = Validator::make($proj_details,Projects::setRules());

        if($validation->fails())
           return redirect()->back()->withInput()->withErrors($validation);

        else 
        { 
            $project = new Projects();
            $project->project_name = $proj_details['project_name'];
            $project->project_manager_id = $proj_details['user_id'];             
            $project->save();

			// added to relation project_members
			$projectMember = new Project_members();
			$projectMember->project_id = $project->project_id;
			$projectMember->member_id = $proj_details['user_id'];
			$projectMember->save();
        } 		



		return redirect()->back();		
	}
	public function getCards(){
		$user_id = Input::get('user_id');
		
		$cards = Card_members::where('user_id','=',$user_id)->get();
		$project_manager_id = Card_members::where('project_manager_id','=',$user_id);


	}
	public function addCard(){

		if(Request::ajax()){
			$card_details = Input::all();

			$date = new \DateTime();
			$dueDate = $date->getTimestamp () + 172800;

			$card = new Cards;
			$card->card_title = $card_details['card_title'];
			$card->project_id = $card_details['project_id'];
			$card->card_column = 'Todo';
			$card->card_duedate = date('Y-m-d H:i:s', $dueDate);
			$card->save();
			return response ()->json (['new_id' => $card->card_id]);
		}
	}

	/**
	 * Function for change columns on task
	 *
	 * @return mixed
	 */
	public function changeColumn()
	{
		if(Request::ajax()){
			$card_details = Input::all();

			$card = Cards::where('card_id', $card_details['card_id'])->first();
			if ($card) {
				$card->card_column = $card_details['column'];
				$card->save();
			}

			return response ()->json (['response' => 'ok']);
		}
	}

	/**
	 * Function for change members on task
	 *
	 * @return mixed
	 */
	public function changeMembers()
	{
		if(Request::ajax()){
			$request = Input::all();

			Card_members::where('card_id', $request['card_id'])->delete();

			if (isset( $request['members'] )) {
				foreach ($request['members'] as $member) {
					Project_members::where('project_id', $request['project_id'])->where('member_id', $member)->delete();

					$newMemmber             = new Card_members();
					$newMemmber->user_id    = $member;
					$newMemmber->card_id    = $request['card_id'];
					$newMemmber->project_id = $request['project_id'];
					$newMemmber->save ();

					$newMemberProject = new Project_members();
					$newMemberProject->member_id = $member;
					$newMemberProject->project_id = $request['project_id'];
					$newMemberProject->save ();
				}
			}

			return response ()->json (['response' => 'ok']);
		}
	}

	public function changeDue()
	{
		$request = Input::all();

		$due = $request['due'];
		$dueDate = preg_replace ('/^(\d{2})\.(\d{2})\.(\d{4})\s{1}(.+)$/', '$3-$1-$2 $4', $due);

		$card = Cards::where('card_id', $request['card_id'])->first();
		if ($card) {
			$card->card_duedate = $dueDate;
			$card->save();
		}


		return response ()->json (['response' => 'ok']);
	}
}
