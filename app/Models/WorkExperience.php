<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'work_experience';

    protected $fillable = [
        'resume_id',
        'company',
        'position',
        'tasks',
        'start',
        'end',
        'end_reason_id',
        'contact',

    ];


    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['end_reason'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/work-experiences/' . $this->getKey());
    }

    public function end_reason()
    {
        return $this->belongsTo('App\Models\EndReason');
    }
}
