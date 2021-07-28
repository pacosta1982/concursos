<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallStatus extends Model
{
    protected $fillable = [
        'call_id',
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

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/call-statuses/'.$this->getKey());
    }
}
