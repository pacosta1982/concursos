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

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/work-experiences/'.$this->getKey());
    }
}
