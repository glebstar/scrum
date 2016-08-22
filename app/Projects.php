<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cards;

class Projects extends Model
{
    protected $primaryKey = 'project_id';

    protected     $table      = 'projects';
    protected     $fillable   = ['project_name, to_do'];
    static public $rules      = [
        'project_name' => 'required',
    ];

    protected $appends = ['todo', 'doing', 'done'];

    static function setRules()
    {
        return self::$rules;
    }

    /**
     * Function get a members for project
     *
     * @return mixed
     */
    public function members()
    {
        return $this->hasMany('App\Project_members', 'project_id', 'project_id');
    }

    public function getTodoAttribute()
    {
        return $this->attributes['todo'] = (string)Cards::where('project_id', $this->project_id)
            ->where('card_column', 'Todo')
            ->where('card_duedate', '>', date('Y-m-d H:i:s'))
            ->count();
    }

    public function getDoingAttribute()
    {
        return $this->attributes['doing'] = (string)Cards::where('project_id', $this->project_id)
            ->where('card_column', 'Doing')
            ->where('card_duedate', '>', date('Y-m-d H:i:s'))
            ->count();
    }

    public function getDoneAttribute()
    {
        return $this->attributes['done'] = (string)Cards::where('project_id', $this->project_id)
            ->where('card_column', 'Done')
            ->where('card_duedate', '>', date('Y-m-d H:i:s'))
            ->count();
    }
}
