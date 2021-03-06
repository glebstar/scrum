<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Function get projects for user
	 *
	 * @return Collection
	 */
	public function projects()
	{
		$members = $this->hasMany('App\Project_members', 'member_id', 'id')->get();
		$projects = new Collection();

		foreach ($members as $member) {
			$project = $member->project()->getResults();

			if ($project) {
				$projects->add ($project);
			}
		}

		return $projects;
	}
	
	public function cardMembers()
	{
		return $this->hasMany('App\Card_members', 'user_id', 'id');
	}

	public function getCards()
	{
		$userCards = [];
		$userMember = $this->cardMembers()->get();
		foreach ($userMember as $m) {
			$cards = $m->cards()->get();
			foreach ($cards as $c) {
				$userCards[] = $c;
			}
		}

		return $userCards;
	}
}
