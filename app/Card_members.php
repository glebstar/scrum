<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Card_members extends Model {
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

    public function cards()
    {
        return $this->hasMany('App\Cards', 'card_id', 'card_id');
    }
}
