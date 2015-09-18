<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitybook extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activitybooks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id'];


    /**
     * An Activitybook can have many Activities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
