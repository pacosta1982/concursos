<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
        'position_id',
        'requirement_type_id',
        'education_level_id',
        'name',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['requirement_type', 'education_level'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/requirements/' . $this->getKey());
    }

    public function requirement_type()
    {
        return $this->belongsTo('App\Models\RequirementType');
    }

    public function education_level()
    {
        return $this->belongsTo('App\Models\EducationLevel');
    }
}
