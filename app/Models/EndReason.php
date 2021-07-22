<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndReason extends Model
{
    protected $table = 'end_reason';

    protected $fillable = [
        'name',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/end-reasons/'.$this->getKey());
    }
}
