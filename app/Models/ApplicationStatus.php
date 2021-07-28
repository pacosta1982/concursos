<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $fillable = [
        'application_id',
        'status_id',
        'user',
        'user_model',
        'description',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['status'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/application-statuses/' . $this->getKey());
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
