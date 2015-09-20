<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category', 'activitybook_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * An Activity belongs to an Activitybook
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activitybook()
    {
        return $this->belongsTo('App\Activitybook');
    }
    
    /**
     * An Activity has many tasklists
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasklists()
    {
    	return $this->hasMany('App\Tasklist');
    }

}
