<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $primaryKey = 'project_id';

    protected     $table      = 'projects';
    //public        $timestamps = false;
    protected     $fillable   = ['project_name'];
    static public $rules      = [
        'project_name' => 'required',
    ];

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
}
