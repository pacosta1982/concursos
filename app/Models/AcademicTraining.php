<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicTraining extends Model
{
    protected $table = 'academic_training';

    protected $fillable = [
        'resume_id',
        'education_level_id',
        'academic_state_id',
        'name',
        'institution',
        'registered',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['education_level', 'academic_state'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/academic-trainings/' . $this->getKey());
    }

    public function education_level()
    {
        return $this->belongsTo('App\Models\EducationLevel');
    }

    public function academic_state()
    {
        return $this->belongsTo('App\Models\AcademicState');
    }
}
