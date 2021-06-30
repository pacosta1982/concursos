<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'description',
        'call_type_id',
        'position_id',
        'company_id',
        'start',
        'end',
    
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
        return url('/admin/calls/'.$this->getKey());
    }
}
