<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Application extends Model
{

    protected $fillable = [
        'code',
        'call_id',
        'resume_id',
        'data',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'data',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['call', 'statuses','resume'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/applications/' . $this->getKey());
    }

    public function call()
    {
        return $this->belongsTo('App\Models\Call');
    }

    public function resume()
    {
        return $this->belongsTo('App\Models\Resume');
    }

    public function statuses()
    {
        return $this->hasOne('App\Models\ApplicationStatus')->latest('id');
    }
}
