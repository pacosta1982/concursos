<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'names',
        'last_names',
        'government_id',
        'birthdate',
        'gender',
        'nationality',
        'address',
        'neighborhood',
        'phone',
        'email',
    
    ];
    
    
    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/resumes/'.$this->getKey());
    }
}
