<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Tasklist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'creation', 'completed', 'active', 'activity_id', 'reminder_id', 'geolocation_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * An Tasklist belongs to an Activity
     * @follow NEVER
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activitybook()
    {
        return $this->belongsTo('App\Activity');
    }
}
