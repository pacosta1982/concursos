<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EthnicResume extends Model
{
    protected $fillable = [
        'resume_id',
        'name',
        'zone',
        'registered',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ethnic-resumes/'.$this->getKey());
    }
}
