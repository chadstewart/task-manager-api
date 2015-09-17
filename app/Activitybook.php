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
    protected $fillable = ['name', 'creation_time', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id'];
}
