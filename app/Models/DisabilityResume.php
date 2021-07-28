<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisabilityResume extends Model
{
    protected $fillable = [
        'resume_id',
        'disability_id',
        'cause',
        'percent',
        'certificate',
        'certificate_date',

    ];


    protected $dates = [
        'certificate_date',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['disability'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/disability-resumes/' . $this->getKey());
    }

    public function disability()
    {
        return $this->belongsTo('App\Models\Disability');
    }
}
