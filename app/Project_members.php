<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_members extends Model
{
    public $timestamps = false;

    /**
     * Function get a user for member
     *
     * @return mixed
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function project()
    {
        return $this->hasOne('App\Projects', 'project_id', 'project_id');
    }
}
