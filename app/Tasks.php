<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'status', 'tasklist_id', 'creation', 'reminder_id', 'geolocation_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * A Task belongs to a Tasklist
     * @follow NEVER
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasklist()
    {
        return $this->belongsTo('App\Tasklist');
    }
}
