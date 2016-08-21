<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model {

	protected $primaryKey = 'card_id';
	protected $table = 'cards';
	protected $fillable = ['prject_name']; 
	public $timestamps = false;

	/**
	 * Function get a members for task
	 *
	 * @return mixed
	 */
	public function members()
	{
		return $this->hasMany('App\Card_members', 'card_id', 'card_id');
	}
}
